<?php

/**
 * Validator
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Laminas\Form\Exception;

/**
 * @Annotation
 */
class Validator
{
    /**
     * @var array
     */
    protected $value;

    /**
     * Receive and process the contents of an annotation
     *
     * @param  array $data
     * @throws Exception\DomainException if a 'value' key is missing, or its value is not an array
     */
    public function __construct(array $data)
    {
        if (! isset($data['value']) || ! is_array($data['value'])) {
            throw new Exception\DomainException(sprintf(
                '%s expects the annotation to define an array; received "%s"',
                get_class($this),
                isset($data['value']) ? gettype($data['value']) : 'null'
            ));
        }
        $this->value = $data['value'];
    }

    public function getName()
    {
        $spec = $this->getValidator();

        return $spec['name'];
    }

    public function getOptions()
    {
        $spec = $this->getValidator();

        if (empty($spec['options'])) {
            return null;
        }

        return $spec['options'];
    }

    /**
     * Retrieve the validator specification
     *
     * @return null|array
     */
    public function getValidator()
    {
        return $this->value;
    }
}
