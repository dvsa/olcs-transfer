<?php

namespace Dvsa\Olcs\Transfer\Query\Trailer;

use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class Trailers
 * @Transfer\RouteName("backend/trailers")
 */
class Trailers extends AbstractQuery
{
    use Licence;
}
