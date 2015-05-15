<?php

/**
 * Route Name
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Zend\Form\Annotation\AbstractStringAnnotation;

/**
 * @Annotation
 */
class RouteName extends AbstractStringAnnotation
{
    public function getRouteName()
    {
        return $this->value;
    }
}
