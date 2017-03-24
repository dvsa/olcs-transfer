<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * @author Dmitry Golubev <dmitrij.golubev@valtech.com>
 */
trait PrintOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     */
    protected $isEnforcePrint;

    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\GreaterThan",
     *     "options": {
     *          "min": 1,
     *     },
     * })
     */
    protected $printCopiesCount;

    /**
     * Returns is must be printed
     *
     * @return string (Y|N)
     */
    public function getIsEnforcePrint()
    {
        return $this->isEnforcePrint;
    }

    /**
     * Get count of Printes Copies
     *
     * @return int
     */
    public function getPrintCopiesCount()
    {
        return $this->printCopiesCount;
    }
}
