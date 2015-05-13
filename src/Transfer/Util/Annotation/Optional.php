<?php

/**
 * Optional
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

/**
 * @Annotation
 */
class Optional
{
    /**
     * @var bool
     */
    protected $optional = false;

    /**
     * Receive and process the contents of an annotation
     *
     * @param  array $data
     */
    public function __construct(array $data)
    {
        if (!isset($data['value'])) {
            $data['value'] = true;
        }

        $optional = $data['value'];

        if (!is_bool($optional)) {
            $filter   = new BooleanFilter();
            $optional = $filter->filter($optional);
        }

        $this->optional = $optional;
    }

    /**
     * Get value of optional flag
     *
     * @return bool
     */
    public function getOptional()
    {
        return $this->optional;
    }
}
