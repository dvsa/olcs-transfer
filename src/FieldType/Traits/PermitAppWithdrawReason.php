<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Reason for permit app being withdrawn
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
trait PermitAppWithdrawReason
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "permits_app_withdraw_by_user",
     *              "permits_app_withdraw_declined",
     *              "permits_app_withdraw_not_paid",
     *              "permits_app_withdraw_notsuccess"
     *          }
     *      }
     * })
     */
    protected $reason;

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }
}
