<?php

/**
 * Method
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Zend\Form\Annotation\AbstractStringAnnotation;

/**
 * @Annotation
 */
class Method extends AbstractStringAnnotation
{
    public function getMethod()
    {
        return $this->value;
    }
}
