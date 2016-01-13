<?php

/**
 * TrafficAreaTest
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\OlcsTest\Transfer\Validators;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Validators\TrafficArea;

/**
 * TrafficAreaTest
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
class TrafficAreaTest extends PHPUnit_Framework_TestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = new TrafficArea();
    }

    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($value, $expected)
    {
        $this->assertEquals($expected, $this->sut->isValid($value));
    }

    public function isValidProvider()
    {
        return [
            ['B', true],
            ['C', true],
            ['D', true],
            ['F', true],
            ['G', true],
            ['H', true],
            ['K', true],
            ['M', true],
            ['N', true],
            ['a', false],
            ['A', false],
            ['E', false],
            ['I', false],
            ['J', false],
            ['L', false],
            ['O', false],
            ['b', false],
            ['c', false],
            [1, false],
            [' ', false],
            [null, false],
        ];
    }
}
