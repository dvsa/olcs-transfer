<?php

/**
 * Delete a list of ConditionUndertakings
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\ConditionUndertaking;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/condition-undertaking")
 * @Transfer\Method("DELETE")
 */
class DeleteList extends AbstractCommand
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ids = [];

    /**
     * @return array of int
     */
    public function getIds()
    {
        return $this->ids;
    }
}
