<?php

/**
 * Postcode filter
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Filter;

use Zend\Filter\StringTrim;

/**
 * Postcode filter
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class Postcode extends StringTrim
{
    /**
     * Returns the result of filtering $value
     *
     * @param  string $value
     * @return string
     */
    public function filter($value)
    {
        // apply StringTrim filter
        $value = parent::filter($value);

        // normalise spacing and case
        $value = strtoupper(str_replace(' ', '', $value));

        // insert space between inward and outward postcode parts
        return substr($value, 0, -3) . ' ' . substr($value, -3, 3);
    }
}
