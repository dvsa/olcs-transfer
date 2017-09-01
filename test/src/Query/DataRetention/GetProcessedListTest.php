<?php

namespace Dvsa\OlcsTest\Transfer\Query\Fee;

use Dvsa\Olcs\Transfer\Query\DataRetention\GetProcessedList;
use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Fee\FeeList;

/**
 * Class GetProcessedListTest
 * @package Dvsa\OlcsTest\Transfer\Query\Fee
 */
class GetProcessedListTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = GetProcessedList::create(
            [
                'dataRetentionRuleId' => 11,
                'startDate' => '2017-08-01',
                'endDate' => '2017-09-01',
            ]
        );

        $this->assertEquals(11, $query->getDataRetentionRuleId());
        $this->assertEquals('2017-08-01', $query->getStartDate());
        $this->assertEquals('2017-09-01', $query->getEndDate());
    }
}
