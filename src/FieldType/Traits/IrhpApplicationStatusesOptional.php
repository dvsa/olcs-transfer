<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait IrhpApplicationStatusesOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 *
 */
trait IrhpApplicationStatusesOptional
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "permit_app_cancelled", "permit_app_nys", "permit_app_uc", "permit_app_withdrawn",
     *              "permit_app_awaiting", "permit_app_fee_paid", "permit_app_unsuccessful", "permit_app_issuing",
     *              "permit_app_valid"
     *          }
     *      }
     * })
     */
    protected $irhpApplicationStatuses = [];

    /**
     * @return array
     */
    public function getIrhpApplicationStatuses()
    {
        return $this->irhpApplicationStatuses;
    }
}
