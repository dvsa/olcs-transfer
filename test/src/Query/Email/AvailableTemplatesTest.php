<?php

namespace Dvsa\OlcsTest\Transfer\Query\Email;

use Dvsa\Olcs\Transfer\Query\Email\AvailableTemplates;
use PHPUnit\Framework\TestCase;

/**
 * AvailableTemplates Test
 */
class AvailableTemplatesTest extends TestCase
{
    public function testStructure()
    {
        $data = [];
        $sut = AvailableTemplates::create($data);

        $this->assertEquals(
            $data,
            $sut->getArrayCopy()
        );
    }
}
