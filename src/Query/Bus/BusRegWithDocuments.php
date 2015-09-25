<?php

/**
 * Bus Reg with TxcInbox documents filtered by local authority. Used on SS Bus registrations page
 */
namespace Dvsa\Olcs\Transfer\Query\Bus;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/bus/single/with-documents")
 */
class BusRegWithDocuments extends AbstractQuery implements CachableQueryInterface
{
    use FieldType\Identity;

    /**
     * @Transfer\Optional
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $localAuthority;

    /**
     * @return int
     */
    public function getLocalAuthority()
    {
        return $this->localAuthority;
    }
}
