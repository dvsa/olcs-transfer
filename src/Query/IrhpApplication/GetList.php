<?php

/**
 * Get a list of IRHP Applications
 *
 * @author Scott Callaway <scott.callaway@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;

use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/irhp-application")
 */
final class GetList extends AbstractQuery implements CachableShortTermQueryInterface, OrderedQueryInterface
{
    use OrderedTraitOptional;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $status = null;

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @Transfer\ArrayInput
     *
     */
    protected $statusIds = null;

    /**
     * @return string
     */
    public function getStatusIds()
    {
        return $this->statusIds;
    }

    /**
     * @var int
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * @return int
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
}
