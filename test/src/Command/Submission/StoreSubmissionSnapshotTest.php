<?php

namespace Dvsa\OlcsTest\Transfer\Command\Operator;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Submission\StoreSubmissionSnapshot as Cmd;

/**
 * StoreSubmissionSnapshotTest
 */
class StoreSubmissionSnapshotTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 54,
            'html' => 'HTML',
        ];

        $command = Cmd::create($data);

        $this->assertEquals(54, $command->getId());
        $this->assertEquals('HTML', $command->getHtml());
    }
}
