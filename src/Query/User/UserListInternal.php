<?php

/**
 * User List Internal
 */
namespace Dvsa\Olcs\Transfer\Query\User;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/user/internal-only")
 */
final class UserListInternal extends AbstractQuery implements \Dvsa\Olcs\Transfer\Query\OrderedQueryInterface
{
    use \Dvsa\Olcs\Transfer\Query\OrderedTrait;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     */
    protected $team;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     */
    protected $excludeLimitedReadOnly;

    /**
     * @return bool
     */
    public function getExcludeLimitedReadOnly()
    {
        return $this->excludeLimitedReadOnly;
    }

    /**
     * Get team Id
     *
     * @return int
     */
    public function getIsInternal()
    {
        return true;
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
}
