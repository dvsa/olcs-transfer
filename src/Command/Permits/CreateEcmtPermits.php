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
 * @Transfer\RouteName("backend/permits/ecmt-permits")
 * @Transfer\Method("POST")
 */
final class CreateEcmtPermits extends AbstractCommand
{

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $applicationStatus;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $ecmtPermitsApplication;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $intensity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    public $paymentStatus;


    public function getApplicationStatus()
    {
        return $this->applicationStatus;
    }
    public function getEcmtPermitsApplication()
    {
        return $this->ecmtPermitsApplication;
    }
    public function getIntensity()
    {
        return $this->intensity;
    }
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }
}
