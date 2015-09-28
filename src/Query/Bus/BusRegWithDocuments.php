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
}
