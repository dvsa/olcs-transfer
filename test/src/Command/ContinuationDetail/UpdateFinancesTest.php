<?php

namespace Dvsa\OlcsTest\Transfer\Command\ContinuationDetail;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\ContinuationDetail\UpdateFinances;

/**
 * UpdateFinancesTest
 */
class UpdateFinancesTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 1,
            'version' => 2,
            'averageBalanceAmount' => '123.33',
            'hasOverdraft' => 'Y',
            'overdraftAmount' => '234.45',
            'hasOtherFinances' => 'Y',
            'otherFinancesAmount' => '345.12',
            'otherFinancesDetails' => 'FOO',
        ];

        $command = UpdateFinances::create($data);

        $this->assertEquals(1, $command->getId());
        $this->assertEquals(2, $command->getVersion());
        $this->assertEquals($data['averageBalanceAmount'], $command->getAverageBalanceAmount());
        $this->assertEquals($data['hasOverdraft'], $command->getHasOverdraft());
        $this->assertEquals($data['overdraftAmount'], $command->getOverdraftAmount());
        $this->assertEquals($data['hasOtherFinances'], $command->getHasOtherFinances());
        $this->assertEquals($data['otherFinancesAmount'], $command->getOtherFinancesAmount());
        $this->assertEquals($data['otherFinancesDetails'], $command->getOtherFinancesDetails());
    }
}
