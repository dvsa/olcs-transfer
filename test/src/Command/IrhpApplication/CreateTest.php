<?php

namespace Dvsa\OlcsTest\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\Command\IrhpApplication\Create;

/**
 * Create test
 *
 * @author Andy Newton <andy@vitri.ltd>
 */
class CreateTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'type' => 2,
            'licence' => 7,
            'year' => 2029
        ];

        $command = Create::create($data);

        $this->assertEquals($data['type'], $command->getType());
        $this->assertEquals($data['licence'], $command->getLicence());
        $this->assertEquals($data['year'], $command->getYear());
    }
}
