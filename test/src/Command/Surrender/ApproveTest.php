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
        $now = new \DateTime();
        $yesterday = new \DateTime("yesterday");
        $format = 'Y-m-d';
        return [
            'id' => ['1', '2'],
            'surrenderDate' => [
                $now->format($format),
                $yesterday->format($format)
            ]
        ];
    }

    protected function getInvalidFieldValues()
    {
        $now = new \DateTime();
        $format = 'Y-m-d-s';
        return [
            'id' => ['0', ['array']],
            'surrenderDate' => [
                $now->format($format),
                '1',
                'aaaaaa',
                []
            ]
        ];
    }


    protected function getFilterTransformations()
    {
        return [
            'id' => [[99, '99'], ['string', '']],
        ];
    }
}
