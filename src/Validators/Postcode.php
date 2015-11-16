<?php

/**
 * OLCS postcode validator
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Validators;

use Zend\Validator\AbstractValidator;

/**
 * OLCS postcode validator
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class Postcode extends AbstractValidator
{
    /**
     * Holds the templates
     *
     * @var array
     */
    protected $messageTemplates = array(
        'invalid' => 'Invalid postcode'
    );

    /**
     * Holds the array of regexes
     *
     * (Regexes supplied by CPMS team via OLCS-11260)
     */
    protected $patterns = [
       "/^[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}$/",
       "/^[A-Z]{1,2}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{2}$/",
       "/^GIR0[A-Z]{2}$/",
    ];

    /**
     * Check if a postcode is valid
     *
     * @param string $value
     * @return bool
     */
    public function isValid($value)
    {
        // strip whitespace
        $value = preg_replace('/\s+/', '', $value);

        // uppercase
        $value = strtoupper($value);

        foreach ($this->patterns as $pattern) {
            if (preg_match($pattern, $value)) {
                return true;
            }
        }

        $this->error('invalid');
        return false;
    }
}
