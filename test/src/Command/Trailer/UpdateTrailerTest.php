<?php

namespace Dvsa\OlcsTest\Transfer\Command\Trailer;

use Dvsa\Olcs\Transfer\Command\Trailer\UpdateTrailer;
use PHPUnit\Framework\TestCase;

/**
 * Update trailer test
 */
class UpdateTrailerTest extends TestCase
{
    public function testStructure()
    {
        $id = 72;
        $trailerNo = 'TRL012';
        $isLongerSemiTrailer = 'Y';
        $version = 3;

        $data = [
            'id' => $id,
            'trailerNo' => $trailerNo,
            'isLongerSemiTrailer' => $isLongerSemiTrailer,
            'version' => $version
        ];

        $command = UpdateTrailer::create($data);

        $this->assertEquals($id, $command->getId());
        $this->assertEquals($trailerNo, $command->getTrailerNo());
        $this->assertEquals($isLongerSemiTrailer, $command->getIsLongerSemiTrailer());
        $this->assertEquals($version, $command->getVersion());
    }
}
