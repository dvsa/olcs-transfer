<?php

namespace Dvsa\Olcs\Transfer\Command\Surrender;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/licence/single/surrender/withdraw")
 * @Transfer\Method("POST")
 */
class Withdraw extends AbstractCommand
{
    use Identity;


    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *         "haystack": {
     *              "lsts_valid",
     *              "lsts_curtailed",
     *              "lsts_suspended",
     *          }
     *     }
     * })
     */
    protected $status;

    public function getStatus()
    {
        return $this->status;
    }
}
