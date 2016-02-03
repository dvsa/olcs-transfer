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
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $user;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $application;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $transportManager;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\ApplicationStatus"})
     */
    protected $appStatuses;

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
}
