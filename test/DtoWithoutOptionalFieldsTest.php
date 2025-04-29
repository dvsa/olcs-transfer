<?php

namespace Dvsa\OlcsTest\Transfer;

use PHPUnit\Framework\Assert as Assert;

/**
 * Trait DtoWithoutOptionalFieldsTest
 */
trait DtoWithoutOptionalFieldsTest
{
    /**
     * @inheritDoc
     */
    public function testDefaultValues()
    {
        // the test as defined by DtoTest is only relevant to Dto with optional fields
        $this->markTestSkipped('Not applicable to DTOs without optional fields');
    }

    /**
     * @inheritDoc
     */
    protected function getOptionalDtoFields()
    {
        return [];
    }
}
