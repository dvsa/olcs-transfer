<?php

namespace Dvsa\OlcsTest\Transfer\Command\Document;

use Dvsa\Olcs\Transfer\Command\Document\PrintLetters;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit\Framework\TestCase;

class PrintLettersTest extends TestCase
{
    use CommandTest;

    /**
     * @inheritDoc
     */
    protected function createBlankDto()
    {
        return new PrintLetters();
    }

    /**
     * @inheritDoc
     */
    protected function getOptionalDtoFields()
    {
        $this->markTestSkipped('No optional fields to test');
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getFilterTransformations()
    {
        return [
            'ids' => [[[1, 2, 3], ['1', '2', '3']]],
            'method' => [[' email ', 'email'], [' printAndPost ', 'printAndPost']],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getValidFieldValues()
    {
        return [
            'ids' => [['1', '2', '3']],
            'method' => ['email', 'printAndPost'],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getInvalidFieldValues()
    {
        return [
            'ids' => [[['invalid-array']]],
            'method' => [[['invalid-array']], 'post'],
        ];
    }
}
