<?php

namespace Dvsa\OlcsTest\Transfer\Query\Document;

use Dvsa\Olcs\Transfer\Query\Document\AbstractDownload;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryTestCase;

/**
 * @covers Dvsa\Olcs\Transfer\Query\Document\AbstractDownload
 */
class AbstractDownloadTest extends MockeryTestCase
{
    public function testGetSet()
    {
        $data = [
            'isInline' => 'unit_Inline',
        ];

        /** @var AbstractDownload $sut */
        $sut = AbstractDownloadStub::create($data);

        static::assertEquals('unit_Inline', $sut->isInline());
    }
}

/**
 * Stub class for testign AbstractDownload class
 */
class AbstractDownloadStub extends AbstractDownload
{
}
