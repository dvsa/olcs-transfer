<?php

namespace Dvsa\OlcsTest\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\Permits\MaxPermittedReached;

/**
 * Max permitted reached test
 */
class MaxPermittedReachedTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $irhpPermitStockId = 40;
        $licenceId = 9;

        $query = MaxPermittedReached::create(
            [
                'irhpPermitStock' => $irhpPermitStockId,
                'licence' => $licenceId
            ]
        );

        $this->assertEquals($irhpPermitStockId, $query->getIrhpPermitStock());
        $this->assertEquals($licenceId, $query->getLicence());
    }
}
