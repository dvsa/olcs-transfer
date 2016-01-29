<?php

/**
 * Validator
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Zend\Form\Annotation\Validator as ZendValidator;

/**
 * @Annotation
 */
class Validator extends ZendValidator
{
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
}
