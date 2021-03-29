<?php

namespace Dvsa\Olcs\Transfer\Validators;

use Laminas\Validator\Regex;

/**
 * Trailer registration number validator
 */
class TrailerRegNumber extends Regex
{
    /**
     * @var array
     */
    protected $messageTemplates = [
        self::INVALID   => 'trailer.registration-number.invalid.error',
        self::NOT_MATCH => 'trailer.registration-number.invalid.error',
        self::ERROROUS  => 'trailer.registration-number.invalid.error',
    ];

    /**
     * Sets validator options
     */
    public function __construct()
    {
        // 1 letter followed by 7 digits
        $pattern = '/^[A-Za-z][0-9]{7}$/';

        parent::__construct($pattern);
    }
}
