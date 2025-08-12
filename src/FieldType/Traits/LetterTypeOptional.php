<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Letter Type Optional
 */
trait LetterTypeOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $letterType;

    /**
     * @return int
     */
    public function getLetterType()
    {
        return $this->letterType;
    }
}