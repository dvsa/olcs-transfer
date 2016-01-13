<?php

/**
 * National register repute url for a transport manager
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Nr;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;

/**
 * @Transfer\RouteName("backend/nr/repute")
 */
class ReputeUrl extends AbstractQuery implements CachableQueryInterface
{
    use Identity;
}
