<?php

namespace Dvsa\OlcsTest\Transfer\Command\Partial;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Partial\OperatingCentreEvidence;

/**
 * Operating Centre Evidence Partial test
 */
class OperatingCentreEvidenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'aocId' => 69,
            'adPlacedIn' => 'foo',
            'adPlacedDate' => '2016-02-01'
        ];

        $command = OperatingCentreEvidence::create($data);

        $this->assertEquals(69, $command->getAocId());
        $this->assertEquals('foo', $command->getAdPlacedIn());
        $this->assertEquals('2016-02-01', $command->getAdPlacedDate());
    }
}
