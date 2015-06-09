<?php

namespace Dvsa\Olcs\Transfer\Query\Cases\EnvironmentalComplaint;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Compaint
 * @Transfer\RouteName("backend/environmental-complaint/single")
 */
class EnvironmentalComplaint extends AbstractQuery
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case;

    /**
     * @Transfer\Optional()
     * isCompliance = 1 unless Environmental
     */
    protected $isCompliance = 0;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCase()
    {
        return $this->case;
    }

    /**
     * @return bool
     */
    public function getIsCompliance()
    {
        return $this->isCompliance;
    }
}
