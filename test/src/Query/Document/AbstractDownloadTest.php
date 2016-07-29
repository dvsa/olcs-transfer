<?php

namespace Dvsa\OlcsTest\Transfer\Query\Variation;

use Dvsa\Olcs\Transfer\Query\Document\AbstractDownload;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery as m;

/**
 * @covers Dvsa\Olcs\Transfer\Query\Document\AbstractDownload
 */
class AbstractDownloadTest extends MockeryTestCase
{
    public function testGetSet()
    {
        $data = [
            'identifier' => 'unit_id',
            'isInline' => 'unit_Inline',
        ];

        /** @var AbstractDownload $sut */
        $sut = AbstractDownloadStub::create($data);

        static::assertEquals('unit_id', $sut->getIdentifier());
        static::assertEquals('unit_Inline', $sut->isInline());
    }
}

/**
 * Stub class for testign AbstractDownload class
 */
class AbstractDownloadStub extends AbstractDownload
{
}
