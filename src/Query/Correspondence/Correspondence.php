<?php

namespace Dvsa\Olcs\Transfer\Query\Correspondence;

<<<<<<< HEAD
=======
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
>>>>>>> develop
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Correspondence
 * @Transfer\RouteName("backend/correspondence/single")
 */
class Correspondence extends AbstractQuery
{
<<<<<<< HEAD
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
=======
    use Identity;
>>>>>>> develop
}
