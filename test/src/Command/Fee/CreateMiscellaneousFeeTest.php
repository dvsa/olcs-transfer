<?php

namespace Dvsa\OlcsTest\Transfer\Command\Fee;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Fee\CreateMiscellaneousFee;

/**
 * Create Miscellaneous Fee test
 */
class CreateMiscellaneousFeeTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'amount' => '1234.56',
            'feeType' => '99',
            'invoicedDate' => '2015-06-18',
        ];

        $command = CreateMiscellaneousFee::create($data);

        $this->assertEquals('1234.56', $command->getAmount());
        $this->assertEquals('99', $command->getFeeType());
        $this->assertEquals('2015-06-18', $command->getInvoicedDate());
    }
}
