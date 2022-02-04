<?php

declare(strict_types = 1);

namespace Dvsa\OlcsTest\Transfer\Command\Bus;

use Dvsa\Olcs\Transfer\Command\Bus\UpdateEndDate;

/**
 * @see UpdateEndDate
 */
class UpdateEndDateTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure(): void
    {
        $id = 123;
        $version = 456;
        $endDate = '2022-12-25';

        $data = [
            'id' => $id,
            'version' => $version,
            'endDate' => $endDate,
        ];

        $command = UpdateEndDate::create($data);

        $this->assertEquals($id, $command->getId());
        $this->assertEquals($version, $command->getVersion());
        $this->assertEquals($endDate, $command->getEndDate());
    }
}
