<?php

/**
 * Get a list of Transport Manager Applications
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\TransportManagerApplication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/transport-manager-application")
 */
class GetList extends AbstractQuery
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $user;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $application;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $transportManager;

    /**
     * @Transfer\Optional
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\ApplicationStatus"})
     */
    protected $appStatuses = [];

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     */
    protected $filterByOrgUser;

    public function getUser()
    {
        return $this->user;
    }

    public function getApplication()
    {
        return $this->application;
    }

    public function getTransportManager()
    {
        return $this->transportManager;
    }

    /**
     * @return array
     */
    public function getAppStatuses()
    {
        return $this->appStatuses;
    }

    /**
     * Filter by organisation user
     *
     * @return bool
     */
    public function getFilterByOrgUser()
    {
        return $this->filterByOrgUser;
    }
}
