<?php

namespace Dvsa\OlcsTest\Transfer\Command\Surrender;

use Dvsa\Olcs\Transfer\Command\Surrender\Approve;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use \PHPUnit\Framework\TestCase;

class ApproveTest extends TestCase
{
    use CommandTest;

    protected function createBlankDto()
    {
        return new Approve();
    }

    protected function getOptionalDtoFields()
    {
        return [];
    }

    protected function getValidFieldValues()
    {
        return [
            'id' => ['1', '2'],

        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'id' => ['0', ['array']],
        ];
    }


    protected function getFilterTransformations()
    {
        return [
            'id' => [[99, '99'], ['string', '']],
        ];
    }
}
