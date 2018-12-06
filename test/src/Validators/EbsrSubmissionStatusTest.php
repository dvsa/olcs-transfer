<?php

namespace Dvsa\OlcsTest\Transfer\Validators;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Validators\EbsrSubmissionStatus;

/**
 * EbsrSubmissionStatusTest
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
class EbsrSubmissionStatusTest extends PHPUnit_Framework_TestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = new EbsrSubmissionStatus();
    }

    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($value, $expected)
    {
        $this->assertEquals($expected, $this->sut->isValid($value));
    }

    /**
     * @return array
     */
    public function isValidProvider()
    {
        return [
            ['ebsrs_processed', true],
            ['ebsrs_processing', true],
            ['ebsrs_submitted', true],
            ['ebsrs_validating', true],
            ['ebsrs_failed', true],
            ['ebsrs_uploaded', true],
            ['a', false],
            [1, false],
            [' ', false],
            [null, false],
        ];
    }
}
