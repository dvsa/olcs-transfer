<?php

namespace Dvsa\OlcsTest\Transfer\Query\Email;

use Dvsa\Olcs\Transfer\Query\Email\TemplateSource;
use PHPUnit\Framework\TestCase;

/**
 * TemplateSource Test
 */
class TemplateSourceTest extends TestCase
{
    public function testStructure()
    {
        $data = [
            'locale' => 'cy_GB',
            'format' => 'plain',
            'template' => 'send-ecmt-successful',
        ];

        $sut = TemplateSource::create($data);

        $this->assertEquals(
            $data,
            $sut->getArrayCopy()
        );
    }
}
