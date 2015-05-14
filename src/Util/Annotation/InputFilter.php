<?php

/**
 * InputFilter
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Zend\Form\Annotation\InputFilter as ZendInputFilter;

/**
 * @Annotation
 */
class InputFilter extends ZendInputFilter
{
    public function getName()
    {
        $spec = $this->getInputFilter();

        if (empty($spec['name'])) {
            return null;
        }

        return $spec['name'];
    }
}
