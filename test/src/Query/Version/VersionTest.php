<?php
namespace Dvsa\OlcsTest\Transfer\Query\Version;

use Dvsa\Olcs\Transfer\Query\Version\Version;
use Dvsa\OlcsTest\Transfer\DtoWithoutOptionalFieldsTest;
use Dvsa\OlcsTest\Transfer\Query\QueryTest;
use PHPUnit\Framework\TestCase;

class VersionTest extends TestCase
{
    use QueryTest, DtoWithoutOptionalFieldsTest {
        DtoWithoutOptionalFieldsTest::testDefaultValues insteadof QueryTest;
    }

    protected function createBlankDto()
    {
        return new Version();
    }

    protected function getValidFieldValues()
    {
        return [
            'id' => [
                '1'
            ]
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            "id"=>[
                0
            ]
        ];
    }

    protected function getFilterTransformations()
    {
        return [
            'id' => [[99, '99']],
        ];
    }
}
