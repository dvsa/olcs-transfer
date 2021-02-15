<?php

namespace Dvsa\OlcsTest\Transfer;

use PHPUnit\Framework\Assert as Assert;

/**
 * Trait DtoWithoutInvalidFieldTest
 */
trait DtoWithoutInvalidFieldTest
{
    /**
     * @inheritDoc
     */
    public function testInvalidField()
    {
        // the test as defined by DtoTest is only relevant to Dto with fields validation
        Assert::assertTrue(true);
    }

    /**
     * @inheritDoc
     */
    protected function getInvalidFieldValues()
    {
        return [];
    }
}
