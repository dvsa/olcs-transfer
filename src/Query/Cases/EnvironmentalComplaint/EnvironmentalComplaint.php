<?php

namespace Dvsa\Olcs\Transfer\Query\Cases\EnvironmentalComplaint;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Compaint
 * @Transfer\RouteName("backend/environmental-complaint/single")
 */
class EnvironmentalComplaint extends AbstractQuery
{
    use Identity;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case;

    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Identical", "options": {"token": "0"}})
     */
    protected $isCompliance = '0';

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
