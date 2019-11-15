<?php

/**
 * Get list of IRHP Candidate Permits by IRHP Application id
 */
namespace Dvsa\Olcs\Transfer\Query\IrhpCandidatePermit;

use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpApplication;
use Dvsa\Olcs\Transfer\FieldType\Traits\IsPreGrant;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/irhp-candidate-permits/by-irhp-application")
 */
class GetListByIrhpApplication extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use IrhpApplication;
    use PagedTrait;
    use OrderedTrait;
    use IsPreGrant;
}
