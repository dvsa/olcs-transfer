<?php

/**
 * Create ECMT Permit Application
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permit-application")
 * @Transfer\Method("POST")
 */
final class CreateEcmtPermitApplication extends AbstractCommand
{

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $status;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    public $paymentStatus;


    public function getStatus()
    {
        return $this->status;
    }
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

}
