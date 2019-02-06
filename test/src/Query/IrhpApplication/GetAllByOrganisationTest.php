<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpApplication;

use Dvsa\Olcs\Transfer\Query\IrhpApplication\GetAllByOrganisation;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpApplication\GetAllByOrganisation
 */

class GetAllByOrganisationTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = GetAllByOrganisation::create(
            [
              'organisation' => 1,
              'sort' => 'id',
              'order' => 'ASC',
              'irhpApplicationStatuses' => ['s1', 's2'],
            ]
        );
        $this->assertEquals(1, $sut->getOrganisation());
        $this->assertEquals('id', $sut->getSort());
        $this->assertEquals('ASC', $sut->getOrder());
        $this->assertEquals(['s1', 's2'], $sut->getIrhpApplicationStatuses());
        $this->assertEquals(
            [
                'organisation' => 1,
                'sort' => 'id',
                'order' => 'ASC',
                'sortWhitelist' => [],
                'irhpApplicationStatuses' => ['s1', 's2'],
            ],
            $sut->getArrayCopy()
        );
    }
}
