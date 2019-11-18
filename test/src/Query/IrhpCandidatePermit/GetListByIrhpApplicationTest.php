<?php

namespace Dvsa\OlcsTest\Transfer\Query\IrhpCandidatePermit;

use Dvsa\Olcs\Transfer\Query\IrhpCandidatePermit\GetListByIrhpApplication;

/**
 * @covers \Dvsa\Olcs\Transfer\Query\IrhpCandidatePermit\GetListByIrhpApplication
 */
class GetListByIrhpApplicationTest extends \PHPUnit\Framework\TestCase
{
    public function testStructure()
    {
        $sut = GetListByIrhpApplication::create(
            [
                'irhpApplication' => 2,
                'page' => 1,
                'limit' => 10,
                'sort' => 'id',
                'order' => 'ASC',
                'isPreGrant' => false
            ]
        );
        static::assertEquals(
            [
                'irhpApplication' => 2,
                'page' => 1,
                'limit' => 10,
                'sort' => 'id',
                'order' => 'ASC',
                'sortWhitelist' => [],
                'isPreGrant' => false
            ],
            $sut->getArrayCopy()
        );
    }
}
