<?php

/**
 * Application
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @src\RouteName("backend/application/single")
 */
class Application extends AbstractQuery
{
    /**
     * @src\Filter({"name":"Zend\Filter\Digits"})
     * @src\Validator({"name":"Zend\Validator\Digits"})
     * @src\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}
