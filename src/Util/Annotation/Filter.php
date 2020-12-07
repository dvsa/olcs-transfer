<?php

/**
 * Filter
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Laminas\Form\Annotation\Filter as LaminasFilter;

/**
 * @Annotation
 */
class Filter extends LaminasFilter
{
    public function getName()
    {
        $spec = $this->getFilter();

        return $spec['name'];
    }

    public function getOptions()
    {
        $spec = $this->getFilter();

        if (empty($spec['options'])) {
            return null;
        }

        return $spec['options'];
    }
}
