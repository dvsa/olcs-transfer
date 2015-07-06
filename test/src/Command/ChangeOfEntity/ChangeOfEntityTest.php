<?php

namespace Dvsa\OlcsTest\Transfer\Command\ChangeOfEntity;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\ChangeOfEntity\ChangeOfEntity as Cmd;

/**
 * Change Of Entity command test
 */
class ChangeOfEntityTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'version' => 222,
            'oldLicenceNo' => 'oldNo',
            'oldOrganisationName' => 'oldName',
            'applicationId' => 69,
        ];

        $command = Cmd::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(222, $command->getVersion());
        $this->assertEquals(69, $command->getApplicationId());
        $this->assertEquals('oldNo', $command->getOldLicenceNo());
        $this->assertEquals('oldName', $command->getOldOrganisationName());
    }
}
