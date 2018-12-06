<?php

namespace Dvsa\OlcsTest\Transfer\Query\CommunityLic;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\CommunityLic\CommunityLicences;

/**
 *  Community licences test
 */
class CommunityLicencesTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = CommunityLicences::create(
            [
                'sort' => 'id',
                'order' => 'ASC',
                'statuses' => 'foo',
                'licence' => 1
            ]
        );
        $this->assertEquals(1, $query->getLicence());
        $this->assertEquals('foo', $query->getStatuses());
        $this->assertEquals('ASC', $query->getOrder());
        $this->assertEquals('id', $query->getSort());
    }
}
