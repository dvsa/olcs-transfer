<?php

namespace Dvsa\Olcs\Transfer\Query\Opposition;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class OppositionList
 * @Transfer\RouteName("backend/opposition")
 */
class OppositionList extends AbstractQuery
{
    /**
     * @Transfer\Optional()
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
    protected $licence;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case;

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
     * Get Licence ID
     *
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * Get Case ID
     *
     * @return int
     */
    public function getCase()
    {
        return $this->case;
    }
}
