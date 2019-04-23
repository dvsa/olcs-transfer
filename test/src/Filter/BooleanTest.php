<?php


namespace Dvsa\OlcsTest\Transfer\Filter;

use Dvsa\Olcs\Transfer\Filter\Boolean;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class BooleanTest extends MockeryTestCase
{
    /**
     * @dataProvider provideFilter
     * @param $input
     * @param $output
     */
    public function testFilter($input, $output)
    {
        $sut = new Boolean();
        $this->assertEquals($output, $sut->filter($input));
    }

    /**
     * @return array
     */
    public function provideFilter()
    {
        return [
            [null, null],
            [1, true],
            [0, false],
            [-1, true],
            [5, true],
            ["string", true],
            [[], false],
            [2.1, true],
        ];
    }
}
