<?php

namespace Dvsa\OlcsTest\Transfer\Query\Fee;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\Fee\FeeTypeList;

/**
 * Fee List Test
 */
class FeeTypeListTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = FeeTypeList::create(
            [
                'application' => 11,
                'licence' => 12,
                'busReg' => 13,
                'organisation' => 14,
                'isMiscellaneous' => 1,
                'effectiveDate' => '2015-10-23',
            ]
        );

        $this->assertEquals(
            [
                'application' => 11,
                'licence' => 12,
                'busReg' => 13,
                'organisation' => 14,
                'isMiscellaneous' => 1,
                'effectiveDate' => '2015-10-23',
            ],
            $query->getArrayCopy()
        );
    }
}