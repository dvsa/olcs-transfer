<?php

namespace Dvsa\Olcs\Transfer\Filter;

use Zend\Filter\AbstractFilter;

/**
 * Converts select-box date array to a date object
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class DateArray extends AbstractFilter
{
    public function filter($value)
    {
        if (!is_array($value)) {
            return null;
        }
        $obj = new \DateTime();
        var_dump($value);
        $obj->setDate($value['year'], $value['month'], $value['day']);
        return $obj;
    }
}
