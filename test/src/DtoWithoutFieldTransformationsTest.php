<?php

namespace Dvsa\OlcsTest\Transfer;

use PHPUnit\Framework\Assert as Assert;

/**
 * Trait DtoWithoutFieldTransformationsTest
 */
trait DtoWithoutFieldTransformationsTest
{
    /**
     * @inheritDoc
     */
    public function testFieldTransformations()
    {
        // the test as defined by DtoTest is only relevant to Dto with filtered fields
        Assert::assertTrue(true);
    }

    /**
     * @inheritDoc
     */
    protected function getFilterTransformations()
    {
        return [];
    }
}
