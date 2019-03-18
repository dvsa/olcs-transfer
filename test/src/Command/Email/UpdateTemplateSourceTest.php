<?php

namespace Dvsa\OlcsTest\Transfer\Command\Email;

use Dvsa\Olcs\Transfer\Command\Email\UpdateTemplateSource;
use PHPUnit\Framework\TestCase;

/**
 * Update template source test
 */
class UpdateTemplateSourceTest extends TestCase
{
    public function testStructure()
    {
        $data = [
            'locale' => 'cy_GB',
            'format' => 'plain',
            'template' => 'send-ecmt-successful',
            'source' => '{{ var1 }} test {{ var2 }}',
        ];

        $command = UpdateTemplateSource::create($data);

        $this->assertEquals(
            $data,
            $command->getArrayCopy()
        );
    }
}
