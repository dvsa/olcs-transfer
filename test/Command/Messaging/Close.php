<?php

declare(strict_types=1);

namespace Dvsa\OlcsTest\Transfer\Command\Messaging;

use PHPUnit\Framework\TestCase;

class Close extends TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
        ];

        $command = \Dvsa\Olcs\Transfer\Command\Messaging\Close::create($data);

        $this->assertEquals(111, $command->getId());
    }
}
