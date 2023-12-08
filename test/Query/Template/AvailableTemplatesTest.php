<?php

namespace Dvsa\OlcsTest\Transfer\Query\Template;

use Dvsa\Olcs\Transfer\Query\Template\AvailableTemplates;
use PHPUnit\Framework\TestCase;

/**
 * AvailableTemplates Test
 */
class AvailableTemplatesTest extends TestCase
{
    public function testStructure()
    {
        $data = [
            'page' => null,
            'limit' => null,
            'sort' => null,
            'order' => null,
            'sortWhitelist' => [],
            'emailTemplateCategory' => null
        ];
        $sut = AvailableTemplates::create($data);

        $this->assertEquals(
            $data,
            $sut->getArrayCopy()
        );
    }
}
