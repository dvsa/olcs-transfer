<?php

namespace Dvsa\Olcs\Transfer\Util;

use Laminas\Router\Http\RouteInterface;
use Laminas\Router\Http\RouteMatch;
use Traversable;
use Laminas\Router\Exception;
use Laminas\Stdlib\ArrayUtils;
use Laminas\Stdlib\RequestInterface as Request;

/**
 * Hostname route.
 *
 * @NOTE This is a temp fix while we are using invalid hostnames in our environments
 * this should be removed
 */
class Hostname implements RouteInterface
{
    /**
     * Parts of the route.
     *
     * @var array
     */
    protected $parts;

    /**
     * Regex used for matching the route.
     *
     * @var string
     */
    protected $regex;

    /**
     * Map from regex groups to parameter names.
     *
     * @var array
     */
    protected $paramMap = array();

    /**
     * Default values.
     *
     * @var array
     */
    protected $defaults;

    /**
     * List of assembled parameters.
     *
     * @var array
     */
    protected $assembledParams = array();

    /**
     * Create a new hostname route.
     *
     * @param string $route       route
     * @param array  $constraints contraints
     * @param array  $defaults    defaults
     */
    public function __construct($route, array $constraints = array(), array $defaults = array())
    {
        $this->defaults = $defaults;
        $this->parts    = $this->parseRouteDefinition($route);
        $this->regex    = $this->buildRegex($this->parts, $constraints);
    }

    /**
     * factory(): defined by RouteInterface interface.
     *
     * @param array|Traversable $options options
     *
     * @see \Laminas\Router\RouteInterface::factory()
     * @return Hostname
     * @throws Exception\InvalidArgumentException
     */
    public static function factory($options = array())
    {
        if ($options instanceof Traversable) {
            $options = ArrayUtils::iteratorToArray($options);
        } elseif (!is_array($options)) {
            $msg = __METHOD__ . ' expects an array or Traversable set of options';
            throw new Exception\InvalidArgumentException($msg);
        }

        if (!isset($options['route'])) {
            throw new Exception\InvalidArgumentException('Missing "route" in options array');
        }

        if (!isset($options['constraints'])) {
            $options['constraints'] = array();
        }

        if (!isset($options['defaults'])) {
            $options['defaults'] = array();
        }

        return new static($options['route'], $options['constraints'], $options['defaults']);
    }

    /**
     * Parse a route definition.
     *
     * @param string $def route definition
     *
     * @return array
     * @throws Exception\RuntimeException
     */
    protected function parseRouteDefinition($def)
    {
        $currentPos = 0;
        $length     = strlen($def);
        $parts      = array();
        $levelParts = array(&$parts);
        $level      = 0;

        while ($currentPos < $length) {
            preg_match('(\G(?P<literal>[a-z0-9-_.]*)(?P<token>[:{\[\]]|$))', $def, $matches, 0, $currentPos);

            $currentPos += strlen($matches[0]);

            if (!empty($matches['literal'])) {
                $levelParts[$level][] = array('literal', $matches['literal']);
            }

            if ($matches['token'] === ':') {
                $pattern = '(\G(?P<name>[^:.{\[\]]+)(?:{(?P<delimiters>[^}]+)})?:?)';

                if (!preg_match($pattern, $def, $matches, 0, $currentPos)) {
                    throw new Exception\RuntimeException('Found empty parameter name');
                }

                $levelParts[$level][] = array(
                    'parameter',
                    $matches['name'],
                    isset($matches['delimiters']) ? $matches['delimiters'] : null
                );

                $currentPos += strlen($matches[0]);
            } elseif ($matches['token'] === '[') {
                $levelParts[$level][] = array('optional', array());
                $levelParts[$level + 1] = $levelParts[$level][count($levelParts[$level]) - 1][1];

                $level++;
            } elseif ($matches['token'] === ']') {
                unset($levelParts[$level]);
                $level--;

                if ($level < 0) {
                    throw new Exception\RuntimeException('Found closing bracket without matching opening bracket');
                }
            } else {
                break;
            }
        }

        if ($level > 0) {
            throw new Exception\RuntimeException('Found unbalanced brackets');
        }

        return $parts;
    }

    /**
     * Build the matching regex from parsed parts.
     *
     * @param array $parts       parts
     * @param array $constraints constraints
     * @param int   $groupIndex  group index
     *
     * @return string
     * @throws Exception\RuntimeException
     */
    protected function buildRegex(array $parts, array $constraints, &$groupIndex = 1)
    {
        $regex = '';

        foreach ($parts as $part) {
            switch ($part[0]) {
                case 'literal':
                    $regex .= preg_quote($part[1]);
                    break;

                case 'parameter':
                    $groupName = '?P<param' . $groupIndex . '>';

                    if (isset($constraints[$part[1]])) {
                        $regex .= '(' . $groupName . $constraints[$part[1]] . ')';
                    } elseif ($part[2] === null) {
                        $regex .= '(' . $groupName . '[^.]+)';
                    } else {
                        $regex .= '(' . $groupName . '[^' . $part[2] . ']+)';
                    }

                    $this->paramMap['param' . $groupIndex++] = $part[1];
                    break;

                case 'optional':
                    $regex .= '(?:' . $this->buildRegex($part[1], $constraints, $groupIndex) . ')?';
                    break;
            }
        }

        return $regex;
    }

    /**
     * Build host.
     *
     * @param array $parts        parts
     * @param array $mergedParams merged params
     * @param bool  $isOptional   is optional
     *
     * @return string
     * @throws Exception\RuntimeException
     * @throws Exception\InvalidArgumentException
     */
    protected function buildHost(array $parts, array $mergedParams, $isOptional)
    {
        $host      = '';
        $skip      = true;
        $skippable = false;

        foreach ($parts as $part) {
            switch ($part[0]) {
                case 'literal':
                    $host .= $part[1];
                    break;

                case 'parameter':
                    $skippable = true;

                    if (!isset($mergedParams[$part[1]])) {
                        if (!$isOptional) {
                            throw new Exception\InvalidArgumentException(sprintf('Missing parameter "%s"', $part[1]));
                        }

                        return '';
                    } elseif (!$isOptional
                        || !isset($this->defaults[$part[1]])
                        || $this->defaults[$part[1]] !== $mergedParams[$part[1]]
                    ) {
                        $skip = false;
                    }

                    $host .= $mergedParams[$part[1]];

                    $this->assembledParams[] = $part[1];
                    break;

                case 'optional':
                    $skippable    = true;
                    $optionalPart = $this->buildHost($part[1], $mergedParams, true);

                    if ($optionalPart !== '') {
                        $host .= $optionalPart;
                        $skip  = false;
                    }
                    break;
            }
        }

        if ($isOptional && $skippable && $skip) {
            return '';
        }

        return $host;
    }

    /**
     * match(): defined by RouteInterface interface.
     *
     * @param Request $request request
     *
     * @see \Laminas\Router\RouteInterface::match()
     * @return RouteMatch|null
     */
    public function match(Request $request)
    {
        if (!method_exists($request, 'getUri')) {
            return null;
        }

        $uri  = $request->getUri();
        $host = $uri->getHost();

        $result = preg_match('(^' . $this->regex . '$)', $host, $matches);

        if (!$result) {
            return null;
        }

        $params = array();

        foreach ($this->paramMap as $index => $name) {
            if (isset($matches[$index]) && $matches[$index] !== '') {
                $params[$name] = $matches[$index];
            }
        }

        return new RouteMatch(array_merge($this->defaults, $params));
    }

    /**
     * assemble(): Defined by RouteInterface interface.
     *
     * @param array $params  params
     * @param array $options options
     *
     * @see \Laminas\Router\RouteInterface::assemble()
     * @return string
     */
    public function assemble(array $params = array(), array $options = array())
    {
        $this->assembledParams = array();

        if (isset($options['uri'])) {
            $host = $this->buildHost(
                $this->parts,
                array_merge($this->defaults, $params),
                false
            );

            $options['uri']->setHost($host);
        }

        // A hostname does not contribute to the path, thus nothing is returned.
        return '';
    }

    /**
     * getAssembledParams(): defined by RouteInterface interface.
     *
     * @see RouteInterface::getAssembledParams
     *
     * @return array
     */
    public function getAssembledParams()
    {
        return $this->assembledParams;
    }
}
