<?php

/**
 * Create IrfoPermitStock
 */
namespace Dvsa\Olcs\Transfer\Command\Irfo;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irfo/permit-stock")
 * @Transfer\Method("POST")
 */
final class CreateIrfoPermitStock extends AbstractCommand
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $irfoCountry;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 1900}})
     */
    protected $validForYear;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"irfo_perm_s_s_ret","irfo_perm_s_s_void","irfo_perm_s_s_issued","irfo_perm_s_s_in_stock"}}})
     * @Transfer\Optional
     */
    protected $status;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $serialNoStart;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $serialNoEnd;

    /**
     * @return int
     */
    public function getIrfoCountry()
    {
        return $this->irfoCountry;
    }

    /**
     * @return int
     */
    public function getValidForYear()
    {
        return $this->validForYear;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getSerialNoStart()
    {
        return $this->serialNoStart;
    }

    /**
     * @return int
     */
    public function getSerialNoEnd()
    {
        return $this->serialNoEnd;
    }
}
