<?php

/**
 * ECMT Applications
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

//use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/permits/ecmt-applications")
 */
class EcmtApplications extends AbstractQuery implements CachableShortTermQueryInterface
{
    //use Identity;
}
