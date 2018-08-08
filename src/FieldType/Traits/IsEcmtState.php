<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait IsEcmtState
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
trait IsEcmtState
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $isEcmtState;

    /**
     * @return int
     */
    public function getIsEcmtState()
    {
        return $this->isEcmtState;
    }
}
