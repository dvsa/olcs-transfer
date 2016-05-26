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
                '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890@'.
                '123456789012345678901234567890123456789012345678901234567890.com',
                true
            ],
            [
                'valid@email.com',
                true
            ],
            [
                // total length greater than 254
                '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890@'.
                '123456789012345678901234567890123456789012345678901234567890.'.
                '123456789012345678901234567890123456789012345678901234567890.'.
                '123456789012345678901234567890123456789012345678901234567890.com',
                false
            ],
            [
                // domain parts max greate than 63 chars
                '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890'.
                '@1234567890123456789012345678901234567890123456789012345678901234.com',
                false
            ],
            [
                '1234567890123456789012345678901234567890123456789012345678901',
                false
            ],
        ];
    }
}
