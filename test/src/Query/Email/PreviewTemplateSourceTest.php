<?php

namespace Dvsa\OlcsTest\Transfer\Query\Email;

use Dvsa\Olcs\Transfer\Query\Email\PreviewTemplateSource;
use PHPUnit\Framework\TestCase;

/**
 * PreviewTemplateSource Test
 */
class PreviewTemplateSourceTest extends TestCase
{
    public function testStructure()
    {
        $data = [
            'locale' => 'cy_GB',
            'format' => 'plain',
            'template' => 'send-ecmt-successful',
            'source' => '{{ var1 }} test {{ var2 }}',
        ];

        $sut = PreviewTemplateSource::create($data);

        $this->assertEquals(
            $data,
            $sut->getArrayCopy()
        );
    }
}
