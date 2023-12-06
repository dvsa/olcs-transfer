<?php

namespace Dvsa\Olcs\Transfer\Validators;

class Sort extends \Laminas\Validator\AbstractValidator
{
    protected const INVALID_SORT = 'invalidSort';

    protected $messageTemplates = array(
        self::INVALID_SORT => 'The sort value is not valid',
    );

    public function isValid($value)
    {
        if (preg_match('/[^a-zA-Z0-9 \.\-_,]/', $value) !== 0) {
            $this->error(self::INVALID_SORT);
            return false;
        }
        return true;
    }
}
