<?php

namespace Dvsa\OlcsTest\Transfer\Validators;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Validators\Order;

/**
 * OrderTest
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
class OrderTest extends PHPUnit_Framework_TestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = new Order();
    }

    /**
     * @dataProvider dataProviderIsValid
     */
    public function testIsValid($value, $expected)
    {
        $this->assertEquals($expected, $this->sut->isValid($value));
    }

    public function dataProviderIsValid()
    {
        return [
            ['asc', true],
            ['desc', true],
            ['asc,desc', true],
            ['desc, asc', true],
            ['ASC, DESC', true],
            ['ASC, DESC, ASC, DESC, ASC', true],
            ['ASCX', false],
            ['DESCX', false],
            ['X', false],
            ['ASC, desc, descX', false],
            ['', false],
            [null, false],
        ];
    }
}
