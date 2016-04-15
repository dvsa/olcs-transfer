<?php

/**
 * Get a Traffic Areas
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\TrafficArea;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/traffic-area/single")
 */
final class Get extends AbstractQuery
{
    /**
     * @var string
     * Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\TrafficArea"})
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
