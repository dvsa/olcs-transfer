<?php

namespace Dvsa\Olcs\Transfer\Query\Task;

use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\BusRegOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\CasesOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\LicenceOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\TransportManagerOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\OrganisationOptional;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/task")
 */
class TaskList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait,
        OrderedTrait,
        LicenceOptional,
        TransportManagerOptional,
        ApplicationOptional,
        BusRegOptional,
        CasesOptional,
        OrganisationOptional;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $assignedToUser;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $assignedToTeam;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $category;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $taskSubCategory;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Laminas\Filter\StringToLower"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options":{"haystack": {"tdt_today", "tdt_all"}}})
     * @Transfer\Optional
     */
    protected $date;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Laminas\Filter\StringToLower"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options":{"haystack": {"tst_open", "tst_closed", "tst_all"}}
     * })
     * @Transfer\Optional
     */
    protected $status;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {
     *          "haystack": {"tsw_all", "tsw_self_only"}
     *     }
     * })
     */
    protected $showTasks = null;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $urgent;

    /**
     * Get Assigned To User
     *
     * @return int
     */
    public function getAssignedToUser()
    {
        return $this->assignedToUser;
    }

    /**
     * Get Assigned To Team
     *
     * @return int
     */
    public function getAssignedToTeam()
    {
        return $this->assignedToTeam;
    }

    /**
     * Get Category
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get Task Sub Category
     *
     * @return int
     */
    public function getTaskSubCategory()
    {
        return $this->taskSubCategory;
    }

    /**
     * Get Date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get Show Tasks
     *
     * @return string
     */
    public function getShowTasks()
    {
        return $this->showTasks;
    }

    /**
     * Get Urgent
     *
     * @return bool
     */
    public function getUrgent()
    {
        return $this->urgent;
    }
}
