<?php

/**
 * Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Router;

use Dvsa\Olcs\Transfer\Router\HttpQuery;
use Zend\Stdlib\RequestInterface as Request;
use Zend\Mvc\Router\Http\RouteMatch;

/**
 * Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Query extends HttpQuery
{
    public function __construct(array $defaults = array())
    {
        $this->defaults = $defaults;
    }

    /**
     * match(): defined by RouteInterface interface.
     *
     * @see    \Zend\Mvc\Router\RouteInterface::match()
     * @param  Request $request
     * @return RouteMatch|null
     */
    public function match(Request $request)
    {
        if (!method_exists($request, 'getMethod')) {
            return null;
        }

        $requestVerb = strtoupper($request->getMethod());

        if ($requestVerb === 'GET') {
            return new RouteMatch($this->defaults);
        }

        return null;
    }
}
