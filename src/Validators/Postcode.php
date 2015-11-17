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
    const POSTCODE_MIN_LENGTH = 6;
    const POSTCODE_MAX_LENGTH = 8;
    const POSTCODE_BAD_LENGTH     = 'postcodeBadLength';
    const POSTCODE_INVALID_FORMAT = 'invalidPostcodeFormat';

    protected $messageTemplates = [
        self::POSTCODE_BAD_LENGTH     => 'Postcode must be either 6, 7 or 8 characters long and start with a letter',
        self::POSTCODE_INVALID_FORMAT => 'Invalid postcode format'
    ];

    protected $postcodeFormats = [
        '[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}',
        '[A-Z]{1,2}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{2}',
        'GIR0[A-Z]{2}'
    ];

    /**
     * Check if a postcode is valid. This re-implements the validation logic
     * that is in CPMS, as per OLCS-11260.
     *
     * @see PaymentDb\Validator\Address in http://gitlab.clb.npm/cpms/payment-db/
     * @todo this will fail (incorrectly) on short postcodes without spaces, e.g. 'L23SW'
     *
     * @param string $value
     * @return bool
     */
    public function isValid($value)
    {
        $length = strlen($value);

        if ($length < self::POSTCODE_MIN_LENGTH || $length > self::POSTCODE_MAX_LENGTH) {
            $this->error(self::POSTCODE_BAD_LENGTH);

            return false;
        }

        $postcode = strtoupper(str_replace(' ', '', $value));
        foreach ($this->postcodeFormats as $format) {
            if (preg_match("/^" . $format . "$/", $postcode)) {
                return true;
            }
        }
        $this->error(self::POSTCODE_INVALID_FORMAT);

        return false;
    }
}
