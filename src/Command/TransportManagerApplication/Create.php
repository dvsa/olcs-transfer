<?php

/**
 * Create Transport Manager Application
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\TransportManagerApplication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/transport-manager-application")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $application;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $transportManager;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $user;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"A","U"}}})
     */
    protected $action;


    /**
     * Get Application ID
     *
     * @return int
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Get Transport Manager ID
     *
     * @return int
     */
    public function getTransportManager()
    {
        return $this->transportManager;
    }

    /**
     * Get User ID
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get Action (eg Update(U), Add(A))
     *
     * @return string A or U
     */
    public function getAction()
    {
        return $this->action;
    }
}
