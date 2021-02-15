<?php

/**
 * Delete Team
 */
namespace Dvsa\Olcs\Transfer\Command\Team;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractDeleteCommand;

/**
 * @Transfer\RouteName("backend/team/single")
 * @Transfer\Method("DELETE")
 */
final class DeleteTeam extends AbstractDeleteCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $newTeam;

    /**
     * @Transfer\Filter({"name": "Laminas\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $validate;

    public function getNewTeam()
    {
        return $this->newTeam;
    }

    public function getValidate()
    {
        return $this->validate;
    }
}
