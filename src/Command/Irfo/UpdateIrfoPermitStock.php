<?php

/**
 * Update IrfoPermitStock
 */
namespace Dvsa\Olcs\Transfer\Command\Irfo;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irfo/permit-stock")
 * @Transfer\Method("PUT")
 */
final class UpdateIrfoPermitStock extends AbstractCommand
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ids;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"irfo_perm_s_s_ret","irfo_perm_s_s_void","irfo_perm_s_s_issued","irfo_perm_s_s_in_stock"}}})
     */
    protected $status;

    /**
     * @return array
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
