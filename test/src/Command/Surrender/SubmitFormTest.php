<?php

namespace Dvsa\OlcsTest\Transfer\Command\Surrender;

use Dvsa\Olcs\Transfer\Command\Surrender\SubmitForm;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;

class SubmitFormTest extends \PHPUnit\Framework\TestCase
{
    use CommandTest;

    protected function createBlankDto()
    {
        return new SubmitForm();
    }

    protected function getOptionalDtoFields()
    {
        return [];
    }

    protected function getValidFieldValues()
    {
        return [
            'id' => ['1', '2'],
            'version' => ['2', '32'],
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
            'version' => [[99, '99'], ['string', '']],
        ];
    }
}
