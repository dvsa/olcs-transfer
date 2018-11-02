<?php

namespace Dvsa\OlcsTest\Transfer\Command\Surrender;

use Dvsa\Olcs\Transfer\Command\Surrender\Create;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit_Framework_TestCase;

class CreateTest extends PHPUnit_Framework_TestCase
{
    use CommandTest;

    protected function createBlankDto()
    {
        return new Create();
    }

    protected function getOptionalDtoFields()
    {
        return [];
    }

    protected function getValidFieldValues()
    {
        return [
            'licence' => ['1', '2'],
            'status' => ['surr_sts_start']
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'licence' => ['string', ['unexpected' => 'array']],
            'status' => ['string', ['unexpected' => 'array']],
        ];
    }


    protected function getFilterTransformations()
    {
        return [
            'licence' => [[99, '99']],
            'status' => [['surr_sts_start ', 'surr_sts_start']],
        ];
    }
}
