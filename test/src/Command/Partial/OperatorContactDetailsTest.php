<?php

namespace Dvsa\OlcsTest\Transfer\Command\Partial;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Partial\OperatorContactDetails;

/**
 * Operator Contact Details Partial test
 */
class OperatorContactDetailsTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 69,
            'version' => 1,
            'emailAddress' => 'foo@bar.com',
            'address' => ['address details'],
            'businessPhoneContact' => ['business phone'],
            'homePhoneContact' => ['home phone'],
            'mobilePhoneContact' => ['mobile phone'],
            'faxPhoneContact' => ['fax phone'],
        ];

        $command = OperatorContactDetails::create($data);

        $this->assertEquals(69, $command->getId());
        $this->assertEquals(1, $command->getVersion());
        $this->assertEquals('foo@bar.com', $command->getEmailAddress());
        $this->assertEquals(['address details'], $command->getAddress());
        $this->assertEquals(['business phone'], $command->getBusinessPhoneContact());
        $this->assertEquals(['home phone'], $command->getHomePhoneContact());
        $this->assertEquals(['mobile phone'], $command->getMobilePhoneContact());
        $this->assertEquals(['fax phone'], $command->getFaxPhoneContact());
    }
}
