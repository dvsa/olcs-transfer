<?php

namespace Dvsa\OlcsTest\Transfer\Validators;

use Dvsa\Olcs\Transfer\Validators\FHAdditionalInfo;
use Mockery\Adapter\Phpunit\MockeryTestCase;

/**
 * @covers \Dvsa\Olcs\Transfer\Validators\FHAdditionalInfo
 */
class FHAdditionalInfoTest extends MockeryTestCase
{
    /** @var FHAdditionalInfo */
    private $sut;

    public function setUp()
    {
        $this->sut = new FHAdditionalInfo();
    }

    /**
     * @dataProvider dpTestIsValid
     */
    public function testIsValid($context, $value, $expect, $errMsg = null)
    {
        static::assertEquals($expect, $this->sut->isValid($value, $context));

        if ($errMsg !== null) {
            static::assertEquals($errMsg, $this->sut->getMessages());
        }
    }

    public function dpTestIsValid()
    {
        return [
            'not need details text' => [
                'context' => [
                    'bankrupt' => 'N',
                    'liquidation' => 'N',
                ],
                'value' => '',
                'expect' => true,
            ],
            'not need details text is empty' => [
                'context' => [
                    'bankrupt' => 'N',
                    'liquidation' => 'Y',
                ],
                'value' => '',
                'expect' => false,
                'errMsg' => [
                    FHAdditionalInfo::IS_EMPTY => 'FHAdditionalInfo.validation.is_empty',
                ],
            ],
            'not need details text is short' => [
                'context' => [
                    'bankrupt' => 'Y',
                    'liquidation' => 'N',
                ],
                'value' => 'to short message',
                'expect' => false,
                'errMsg' => [
                    FHAdditionalInfo::TOO_SHORT => 'FHAdditionalInfo.validation.too_short',
                ],
            ],
            '' => [
                'context' => [
                    'bankrupt' => 'Y',
                    'liquidation' => 'N',
                ],
                'value' => str_repeat('a', FHAdditionalInfo::MIN_LEN),
                'expect' => true,
            ],
        ];
    }
}
