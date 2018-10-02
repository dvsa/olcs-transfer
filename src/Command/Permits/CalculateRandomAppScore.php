<?php

/**
 * Calculate randomised app score
 *
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Cli\Domain\Command\Permits\AbstractStockIdCommand;
/**
 * @Transfer\RouteName("backend/permits/randomised-score")
 * @Transfer\Method("POST")
 */
final class CalculateRandomAppScore extends AbstractCommand
{
/**
     * @var int
     */
    protected $stockId;

    /**
     * Gets the value of stockId
     *
     * @return int
     */
    public function getStockId()
    {
        return $this->stockId;
    }
}
