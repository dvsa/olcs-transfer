<?php

namespace Dvsa\Olcs\Transfer\Query\Cases;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Pi
 * @package Dvsa\Olcs\src\Query\Cases
 * @src\RouteName("backend/cases/pi")
 */
class Pi extends AbstractQuery
{
    /**
     * @var int
     * @src\Filter({"name":"Zend\Filter\Digits"})
     * @src\Validator({"name":"Zend\Validator\Digits"})
     * @src\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
        ];
    }
}
