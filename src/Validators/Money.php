<?php

/**
 * Money amount validator
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Validators;

use Laminas\Validator\AbstractValidator;

/**
 * Money amount validator
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class Money extends AbstractValidator
{
    const INVALID  = 'invalid';

    /**
     * Holds the templates
     *
     * @var array
     */
    protected $messageTemplates = array(
        self::INVALID => 'money-element-invalid'
    );

    /**
     * @var bool
     */
    private $allowNegative = false;

    /**
     * Check if money amount is valid
     *
     * @param string $value Value to check
     *
     * @return bool
     */
    public function isValid($value)
    {
        // None numerics are not allowed
        if (!is_numeric($value)) {
            $this->error('invalid');
            return false;
        }

        // Disallow negative amounts
        if ($this->allowNegative === false) {
            if ($value < 0) {
                $this->error('invalid');
                return false;
            }
        }

        // We can allow ints
        if (is_int($value)) {
            return true;
        }

        $value = floatval($value);

        // If we have a float, it can't be more than 2 dp
        if (round($value, 2) == $value) {
            return true;
        }

        $this->error('invalid');
        return false;
    }

    /**
     * Set validator options
     *
     * @param array $options Options to set
     *
     * @return void
     */
    public function setOptions($options = [])
    {
        if (isset($options['allow_negative']) && $options['allow_negative'] == true) {
            $this->allowNegative = true;
        }

        parent::setOptions($options);
    }
}
