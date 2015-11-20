<?php

/**
 * Custom email validator
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Validators;

/**
 * Custom email validator
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
class EmailAddress extends \Zend\Validator\EmailAddress
{
    /**
     * Should be consistent across the application, see OLCS-9884
     */
    const EMAIL_ADDRESS_MAX_LENGTH = 60;
    const EMAIL_ADDRESS_MIN_LENGTH = 5;
    const ERROR_INVALID = 'emailAddressLengthNotInRange';

    public function __construct($options = array())
    {
        $this->messageTemplates[self::ERROR_INVALID] =
            'Email address should be between ' . self::EMAIL_ADDRESS_MIN_LENGTH . ' and ' .
            self::EMAIL_ADDRESS_MAX_LENGTH . ' characters';
        parent::__construct($options);
    }

    /**
     * Check if email address is valid
     *
     * @param string $value
     * @return bool
     */
    public function isValid($value)
    {
        if (strlen($value) > self::EMAIL_ADDRESS_MAX_LENGTH || strlen($value) < self::EMAIL_ADDRESS_MIN_LENGTH ) {
            $this->error(self::ERROR_INVALID);
            return false;
        }

        return parent::isValid($value);
    }
}
