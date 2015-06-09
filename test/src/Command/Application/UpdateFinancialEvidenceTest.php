<?php

namespace Dvsa\OlcsTest\Transfer\Command\Organisation;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Command\Application\UpdateFinancialEvidence;

/**
 * Update Financial Evidence test
 */
class UpdateFinancialEvidenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 111,
            'version' => 222,
            'financialEvidenceUploaded' => 'Y',
        ];

        $command = UpdateFinancialEvidence::create($data);

        $this->assertEquals(111, $command->getId());
        $this->assertEquals(222, $command->getVersion());
        $this->assertEquals('Y', $command->getFinancialEvidenceUploaded());
    }
}
