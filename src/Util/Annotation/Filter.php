<?php

/**
 * Filter
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Zend\Form\Annotation\Filter as ZendFilter;

/**
 * @Annotation
 */
class Filter extends ZendFilter
{
    public function getName()
    {
        $spec = $this->getFilter();

        if (empty($spec['name'])) {
            return null;
        }

        return $spec['name'];
    }
}
