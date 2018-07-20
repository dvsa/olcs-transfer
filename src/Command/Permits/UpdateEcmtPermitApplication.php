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
final class UpdateEcmtPermitApplication extends AbstractCommand
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

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    public $permitType;


    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    public $licence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     */
    public $cabotage;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     */
    public $declaration;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     */
    public $emissions;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     */
    public $id;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     */
    public $internationalJourneys;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     */
    public $noOfPermits;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     */
    public $permitsRequired;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    public $getSectors;
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Optional
     */
    public $trips;




    /**
     * Get the status
     *
     * @return \Dvsa\Olcs\Api\Entity\System\RefData
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the payment status
     *
     * @return \Dvsa\Olcs\Api\Entity\System\RefData
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }


    /**
     * Get the permit type
     *
     * @return \Dvsa\Olcs\Api\Entity\System\RefData
     */
    public function getPermitType()
    {
        return $this->permitType;
    }


    /**
     * Get the licence
     *
     * @return \Dvsa\Olcs\Api\Entity\Licence\Licence
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * Get the cabotage
     *
     * @return boolean
     */
    public function getCabotage()
    {
        return $this->cabotage;
    }

    /**
     * Get the declaration
     *
     * @return boolean
     */
    public function getDeclaration()
    {
        return $this->declaration;
    }

    /**
     * Get the emissions
     *
     * @return boolean
     */
    public function getEmissions()
    {
        return $this->emissions;
    }

    /**
     * Get the id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the international journeys
     *
     * @return int
     */
    public function getInternationalJourneys()
    {
        return $this->internationalJourneys;
    }


    /**
     * Get the no of permits
     *
     * @return int
     */
    public function getNoOfPermits()
    {
        return $this->noOfPermits;
    }


    /**
     * Get the permits required
     *
     * @return int
     */
    public function getPermitsRequired()
    {
        return $this->permitsRequired;
    }

    /**
     * Get the sectors
     *
     * @return \Dvsa\Olcs\Api\Entity\Permits\Sectors
     */
    public function getSectors()
    {
        return $this->sectors;
    }

    /**
     * Get the trips
     *
     * @return int
     */
    public function getTrips()
    {
        return $this->trips;
    }

}
