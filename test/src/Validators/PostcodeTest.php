<?php

/**
 * Postcode validator test
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\OlcsTest\Transfer\Validators;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Validators\Postcode;

/**
 * Postcode validator test
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
class PostcodeTest extends PHPUnit_Framework_TestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = new Postcode();
    }

    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($value, $expected, $expectedErrors = [])
    {
        $this->assertEquals($expected, $this->sut->isValid($value));

        $this->assertEquals($expectedErrors, $this->sut->getMessages());
    }

    public function isValidProvider()
    {
        return [
            ['LS9 6NF', true],
            ['ls9 6nf', true],
            ['ls96NF', true],
            [' ls96NF', true],
            ['ls99 6NF', true],
            [
                'ls9336NF',
                false,
                ['invalidPostcodeFormat' => 'Invalid postcode format']
            ],
            ['W1A4AA', true],
            ['GIR 0AA', true],
            [
                'not a postcode',
                false,
                ['postcodeBadLength' => 'Postcode must be either 6, 7 or 8 characters long and start with a letter'],
            ],
            ['GIR 0AA', true],
            ['L2 3SW', true],

            // @todo this *should* be a valid postcode
            // ['L23SW', true],
        ];
    }
}
