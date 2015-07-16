<?php

/**
 * YesNoTest
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\OlcsTest\Transfer\Validators;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Validators\YesNo;

/**
 * YesNoTest
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
class YesNoTest extends PHPUnit_Framework_TestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = new YesNo();
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
            ['N', true],
            ['Y', true],
            ['n', false],
            ['y', false],
            ['', false],
            ['A', false],
            ['B', false],
            ['Q', false],
            [null, false],
        ];
    }
}
