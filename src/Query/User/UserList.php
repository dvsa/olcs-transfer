<?php

/**
 * Get a list of Users
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\User;

use Dvsa\Olcs\Transfer\FieldType\Traits\RolesOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/user/internal")
 */
final class UserList extends AbstractQuery implements \Dvsa\Olcs\Transfer\Query\OrderedQueryInterface
{
    use \Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;
    use RolesOptional;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     */
    protected $organisation;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     */
    protected $team;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     */
    protected $isInternal;

    /**
     * Get Organisation ID
     *
     * @return int
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Get team Id
     *
     * @return int
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Get isInternal
     *
     * @return bool
     */
    public function getIsInternal()
    {
        return $this->isInternal;
    }
}
