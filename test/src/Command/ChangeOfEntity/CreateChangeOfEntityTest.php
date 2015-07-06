<?php

namespace Dvsa\OlcsTest\Transfer\Command\ChangeOfEntity;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\ChangeOfEntity\CreateChangeOfEntity as Cmd;

/**
 * Create Change Of Entity command test
 */
class CreateChangeOfEntityTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'oldLicenceNo' => 'oldNo',
            'oldOrganisationName' => 'oldName',
            'applicationId' => 69,
        ];

        $command = Cmd::create($data);

        $this->assertEquals(69, $command->getApplicationId());
        $this->assertEquals('oldNo', $command->getOldLicenceNo());
        $this->assertEquals('oldName', $command->getOldOrganisationName());
    }
}
