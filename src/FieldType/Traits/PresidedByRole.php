<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait PresidedByRole
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait PresidedByRole
{
    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {"tc_r_dhtru", "tc_r_dtc", "tc_r_htru", "tc_r_tc"}
     *      }
     * })
     */
    protected $presidedByRole;

    /**
     * @return int
     */
    public function getPresidedByRole()
    {
        return $this->presidedByRole;
    }
}
