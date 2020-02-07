<?php

namespace Dvsa\OlcsTest\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Command\Licence\ProposeToRevoke;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit\Framework\TestCase;

class ProposeToRevokeTest extends TestCase
{
    use CommandTest;

    /**
     * @inheritDoc
     */
    protected function createBlankDto()
    {
        return new ProposeToRevoke();
    }

    /**
     * @inheritDoc
     */
    protected function getOptionalDtoFields()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getFilterTransformations()
    {
        return [
            'licence' => [[5, '5']],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getValidFieldValues()
    {
        return [
            'licence' => ['6'],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getInvalidFieldValues()
    {
        return [
            'licence' => [[['invalid-array']]],
        ];
    }
}
