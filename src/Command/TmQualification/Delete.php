<?php

namespace Dvsa\Olcs\Transfer\Command\TmQualification;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Delete Inspection Request
 *
 * @Transfer\RouteName("backend/tm-qualification/single")
 * @Transfer\Method("DELETE")
 */
class Delete extends AbstractCommand
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ids;

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }
}
