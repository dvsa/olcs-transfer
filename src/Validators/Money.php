<?php

/**
 * Money amount validator
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Validators;

use Zend\Validator\AbstractValidator;

/**
 * Money amount validator
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class Money extends AbstractValidator
{
    /**
     * Holds the templates
     *
     * @var array
     */
    protected $messageTemplates = array(
        'invalid' => 'Invalid amount'
    );

    /**
     * Check if money amount is valid
     *
     * @param string $value
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
        if ($value < 0) {
            $this->error('invalid');
            return false;
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
}
