<?php

namespace Dvsa\OlcsTest\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\Command\IrhpApplication\Update;

/**
 * Update test
 */
class UpdateTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $data = [
            'checkedAnswers' => 1
        ];

        $command = Update::create($data);

        $this->assertEquals(1, $command->getCheckedAnswers());
    }
}
