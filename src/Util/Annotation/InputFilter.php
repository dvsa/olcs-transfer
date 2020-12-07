<?php

/**
 * InputFilter
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Laminas\Form\Annotation\InputFilter as LaminasInputFilter;

/**
 * @Annotation
 */
class InputFilter extends LaminasInputFilter
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
