<?php

/**
 * OLCS postcode validator
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Validators;

use Laminas\Validator\AbstractValidator;

/**
 * OLCS postcode validator
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class Postcode extends AbstractValidator
{
    const POSTCODE_MIN_LENGTH = 5;
    const POSTCODE_MAX_LENGTH = 8;
    const POSTCODE_BAD_LENGTH     = 'postcodeBadLength';
    const POSTCODE_INVALID_FORMAT = 'invalidPostcodeFormat';
    const POSTCODE_IS_EMPTY       = 'isEmpty';
    const POSTCODE_TOO_LONG       = 'stringLengthTooLong';

    protected $messageTemplates = [
        self::POSTCODE_BAD_LENGTH     => 'postcode.validation.postcodeBadLength',
        self::POSTCODE_INVALID_FORMAT => 'postcode.validation.invalidPostcodeFormat',
        self::POSTCODE_IS_EMPTY       => 'postcode.validation.isEmpty',
        self::POSTCODE_TOO_LONG       => 'postcode.validation.stringLengthTooLong',
    ];

    protected $postcodeFormats = [
        '[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}',
        '[A-Z]{1,2}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{2}',
        'GIR0[A-Z]{2}'
    ];

    /**
     * @var bool
     */
    protected $allowEmpty = false;

    /**
     * @param boolean $allowEmpty
     */
    public function setAllowEmpty($allowEmpty)
    {
        $this->allowEmpty = $allowEmpty;
        return $this;
    }

    /**
     * @return boolean
     */
    public function allowEmpty()
    {
        return $this->allowEmpty;
    }

    /**
     * @param array $options
     * @return AbstractValidator
     */
    public function setOptions($options = [])
    {
        if (isset($options['allow_empty'])) {
            $this->setAllowEmpty($options['allow_empty']);
        }

        return parent::setOptions($options);
    }

    /**
     * Check if a postcode is valid. This re-implements the validation logic
     * that is in CPMS, as per OLCS-11260.
     *
     * @see PaymentDb\Validator\Address in http://gitlab.clb.npm/cpms/payment-db/
     *
     * @param string $value
     * @param array $context
     * @return bool
     */
    public function isValid($value, $context = null)
    {
        if (empty($value) && $this->allowEmpty()) {
            return true;
        }

        if (isset($context['countryCode']) && $context['countryCode'] === 'GB') {
            return $this->validateUkPostcode($value);
        }

        return $this->validateNonUkPostcode($value, $context);
    }

    /**
     * UK postcode cannot usually be empty, must be 5-8 characters and must
     * match a predefined format
     */
    private function validateUkPostcode($value)
    {
        if (empty($value)) {
            $this->error(self::POSTCODE_IS_EMPTY);
            return false;
        }

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

    /**
     * Non-UK postcode must not exceed maximum field length
     */
    private function validateNonUkPostcode($value)
    {
        $length = strlen($value);

        if ($length > self::POSTCODE_MAX_LENGTH) {
            $this->error(self::POSTCODE_TOO_LONG);
            return false;
        }

        return true;
    }
}
