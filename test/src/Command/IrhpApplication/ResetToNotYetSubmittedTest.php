<?php

namespace Dvsa\OlcsTest\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\Command\IrhpApplication\ResetToNotYetSubmitted;

/**
 * ResetToNotYetSubmittedTest
 */
class ResetToNotYetSubmittedTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = ['id' => 114];

        $command = ResetToNotYetSubmitted::create($data);

        $this->assertEquals(114, $command->getId());
    }
}
