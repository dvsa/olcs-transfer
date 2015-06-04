<?php

namespace Dvsa\Olcs\Transfer\Filter;

use Zend\Filter\AbstractFilter;

/**
 * Removes empty items from an array
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class FilterEmptyItems extends AbstractFilter
{
    public function filter($value)
    {
        if (!is_array($value)) {
            return $value;
        }

        $newValue = [];

        foreach ($value as $val) {
            if (!empty($val)) {
                $newValue[] = $val;
            }
        }

        return $newValue;
    }
}
