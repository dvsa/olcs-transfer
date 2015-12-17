<?php

/**
 * BusRegWithTxcInbox
 */
namespace Dvsa\Olcs\Transfer\Query\Bus\Ebsr;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * @Transfer\RouteName("backend/bus/single/txc-inbox")
 */
class BusRegWithTxcInbox extends AbstractQuery implements CachableQueryInterface
{
    use FieldTypeTraits\Identity;
}