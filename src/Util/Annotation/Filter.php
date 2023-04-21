<?php

/**
 * Filter
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

/**
 * @Annotation
 */

class Filter
{
    /** @var string */
    protected $name;

    /** @var array */
    protected $options;

    /** @var int|null */
    protected $priority;

    /**
     * Receive and process the contents of an annotation
     *
     * @param string|array $name
     * @param array $options
     */
    public function __construct($name, array $options = [], ?int $priority = null)
    {
        if (is_array($name)) {
            // support for legacy notation with array as first parameter
            trigger_error(sprintf(
                'Passing a single array to the constructor of %s is deprecated since 3.0.0,'
                . ' please use separate parameters.',
                static::class
            ), E_USER_DEPRECATED);

            $this->name     = $name['name'] ?? null;
            $this->options  = $name['options'] ?? $options;
            $this->priority = $name['priority'] ?? $priority;
        } else {
            $this->name     = $name;
            $this->options  = $options;
            $this->priority = $priority;
        }
    }

    /**
     * Retrieve the filter specification
     *
     * @return array
     */
    public function getFilterSpecification(): array
    {
        $inputSpec = ['name' => $this->name];
        if (! empty($this->options)) {
            $inputSpec['options'] = $this->options;
        }
        if (null !== $this->priority) {
            $inputSpec['priority'] = $this->priority;
        }

        return $inputSpec;
    }

    /**
     * @return mixed|string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array|mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @return int|mixed|null
     */
    public function getPriority()
    {
        return $this->priority;
    }

}

