<?php

/**
 * Get a list of TmApplications and TmLicences 
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\TmResponsibilities;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/tm-responsibilities/transport-manager/named-single")
 */
final class TmResponsibilitiesList extends AbstractQuery
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $transportManager;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":0,"max":512}})
     * @Transfer\Optional
     */
    protected $licenceStatuses;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":0,"max":512}})
     * @Transfer\Optional
     */
    protected $applicationStatuses;

    /**
     * Get a Transport Manager ID
     *
     * @return int
     */
    public function getTransportManager()
    {
        return $this->transportManager;
    }

    /**
     * Get a licence statuses
     *
     * @return array
     */
    public function getLicenceStatuses()
    {
        return $this->licenceStatuses;
    }

    /**
     * Get an application statuses
     *
     * @return array
     */
    public function getApplicationStatuses()
    {
        return $this->applicationStatuses;
    }
}
