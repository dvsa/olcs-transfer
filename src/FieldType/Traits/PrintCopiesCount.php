<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * @author Dmitry Golubev <dmitrij.golubev@valtech.com>
 */
trait PrintCopiesCount
{
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
     * Get count of Printes Copies
     *
     * @return int
     */
    public function getPrintCopiesCount()
    {
        return $this->printCopiesCount;
    }
}
