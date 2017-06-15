<?php

namespace Dvsa\OlcsTest\Transfer\Validators;

use Dvsa\Olcs\Transfer\Validators\UploadEvidence;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery as m;

/**
 * Upload evidence validator test
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
class UploadEvidenceTest extends MockeryTestCase
{
    protected $sut;

    public function setUp()
    {
        $this->sut = m::mock(UploadEvidence::class)->makePartial()->shouldAllowMockingProtectedMethods(true);
    }

    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid($value, $expected, $context)
    {
        $this->sut->shouldReceive('getTranslator')
            ->andReturn(
                m::mock()
                    ->shouldReceive('translate')
                    ->with('upload_evidence_validator_please_upload_advert')
                    ->andReturn('translated')
                    ->getMock()
            )
            ->shouldReceive('setMessage')
            ->with('translated', UploadEvidence::UPLOAD_ADVERT)
            ->shouldReceive('error')
            ->with('transalted')
            ->getMock();
        $this->assertEquals($expected, $this->sut->isValid($value, $context));
    }

    public function isValidProvider()
    {
        return [
            [
                '',
                false,
                [
                    'adPlacedIn' => 'foo'
                ]
            ],
            [
                '',
                false,
                [
                    'adPlacedIn' => 'foo',
                    'file'
                ]
            ],
            [
                '',
                false,
                [
                    'adPlacedIn' => 'foo',
                    'file' => ['list']
                ]
            ],
            [
                '',
                true,
                [
                    'adPlacedIn' => 'foo',
                    'file' => ['list' => ['bar']]
                ]
            ],
            [
                '',
                false,
                [
                    'adPlacedDate' => ['day' => '1']
                ]
            ],
            [
                '',
                false,
                [
                    'adPlacedDate' => ['month' => '1']
                ]
            ],
            [
                '',
                false,
                [
                    'adPlacedDate' => ['year' => '2000']
                ]
            ],
            [
                '',
                true,
                []
            ],
        ];
    }
}
