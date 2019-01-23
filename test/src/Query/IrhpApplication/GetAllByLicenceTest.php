<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\IrhpApplication\GetAllByLicence;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpApplication\GetAllByLicence
 */

class GetAllByLicenceTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = GetAllByLicence::create(
            [
              'licence' => 1,
              'sort' => 'id',
              'order' => 'ASC',
              'irhpApplicationStatuses' => ['s1', 's2'],
            ]
        );
        $this->assertEquals(1, $sut->getLicence());
        $this->assertEquals('id', $sut->getSort());
        $this->assertEquals('ASC', $sut->getOrder());
        $this->assertEquals(['s1', 's2'], $sut->getIrhpApplicationStatuses());
        $this->assertEquals(
            [
                'licence' => 1,
                'sort' => 'id',
                'order' => 'ASC',
                'sortWhitelist' => [],
                'irhpApplicationStatuses' => ['s1', 's2'],
            ],
            $sut->getArrayCopy()
        );
    }
}
