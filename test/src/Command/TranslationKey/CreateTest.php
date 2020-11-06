<?php

namespace Dvsa\OlcsTest\Transfer\Command\TranslationKey;

use Dvsa\Olcs\Transfer\Command\TranslationKey\Create;

/**
 * Create test
 */
class CreateTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 'STRID',
            'description' => 'descr',
            'translationsArray' => [
                'en_GB' => 'English',
                'cy_GB' => 'Welsh',
                'en_NI' => 'English (NI)',
                'cy_NI' => 'Welsh (NI)'
            ]
        ];

        $command = Create::create($data);

        $this->assertEquals($data['id'], $command->getId());
        $this->assertEquals($data['description'], $command->getDescription());
        $this->assertEquals($data['translationsArray'], $command->getTranslationsArray());
    }
}
