<?php

/**
 * EmailAddress validator test
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\OlcsTest\Transfer\Validators;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Validators\EmailAddress;

/**
 * EmailAddress validator test
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
class EmailAddressTest extends PHPUnit_Framework_TestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = new EmailAddress();
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
            [
                'abc',
                false
            ],
            [
                '1234567890123456789012345678901234567890123456789012345678901',
                false
            ],
            [
                'valid@email.com',
                true
            ]
        ];
    }
}
