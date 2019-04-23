<?php

namespace Dvsa\Olcs\Transfer\Filter;

/**
 * Same as \Zend\Filter\Boolean except it does not transforn null to false
 *
 * Class Boolean
 *
 * @package Dvsa\Olcs\Transfer\Filter
 */
class Boolean extends \Zend\Filter\Boolean
{
    public function filter($value)
    {
        if ($value === null) {
            return $value;
        }

        return parent::filter($value);
    }
}
