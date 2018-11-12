<?php

/**
 * Get a list of Traffic Areas
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\TrafficArea;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;

/**
 * @Transfer\RouteName("backend/traffic-area")
 */
final class TrafficAreaList extends AbstractQuery implements
    OrderedQueryInterface,
    CachableMediumTermQueryInterface
{
    use OrderedTrait;

    /**
     * If left null, all traffic areas will be returned
     * @var boolean
     *
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $isEngland;

    /**
     * Get isEngland, if null then all traffic areas will be returned
     *
     * @return bool|null
     */
    public function getIsEngland(): ?bool
    {
        return $this->isEngland;
    }
}
