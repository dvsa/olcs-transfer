<?php

namespace Dvsa\OlcsTest\Transfer\Command\Surrender;

use Dvsa\Olcs\Transfer\Command\Surrender\Withdraw;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use \PHPUnit\Framework\TestCase;

class WithdrawTest extends TestCase
{
    use CommandTest;

    protected function createBlankDto()
    {
        return new Withdraw();
    }

    protected function getOptionalDtoFields()
    {
        return [];
    }

    protected function getValidFieldValues()
    {
        return [
            'id' => ['1', '2']
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'id' => ['0', ['array']]
        ];
    }


    protected function getFilterTransformations()
    {
        return [
            'id' => [[99, '99'], ['string', '']],
        ];
    }
}