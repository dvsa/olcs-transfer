<?php

/**
 * Validator
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Laminas\Form\Annotation\Validator as LaminasValidator;

/**
 * @Annotation
 */
class Validator extends LaminasValidator
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
