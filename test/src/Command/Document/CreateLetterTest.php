<?php

namespace Dvsa\OlcsTest\Transfer\Command\Document;

use PHPUnit\Framework\TestCase;
use \Dvsa\Olcs\Transfer\Command\Document\CreateLetter;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;

class CreateLetterTest extends TestCase
{
    use CommandTest;

    /**
     * @inheritDoc
     */
    protected function createBlankDto()
    {
        return new CreateLetter();
    }

    /**
     * @inheritDoc
     */
    protected function getOptionalDtoFields()
    {
        return [
            'disableBookmarks',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getValidFieldValues()
    {
        return [
            'template' => [
                '1',
                '1001',
            ],
            'data' => [
                'some-string',
                '191',
                ['an-array'],
                '10.1'
            ],
            'disableBookmarks' => [
                'Y',
                'N'
            ],
            'meta' => [
                'a-string',
                21098,
                ['some-array'],
                90.1
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getInvalidFieldValues()
    {
        return [
            'template' => [
                ['array' => 'stuff'],
                []
            ],
            'disableBookmarks' => [
                'Hello',
                ['array'],
                123,
                '123'
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getFilterTransformations()
    {
        return [
            'template' => [
                [1, '1'],
                ['2 ', '2']
            ],
            'disableBookmarks' => [
                ['Y ', 'Y'],
                ['N ', 'N']
            ]
        ];
    }
}
