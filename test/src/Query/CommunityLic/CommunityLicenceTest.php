<?php

namespace Dvsa\OlcsTest\Transfer\Query\CommunityLic;

use PHPUnit_Framework_TestCase;
use Dvsa\Olcs\Transfer\Query\CommunityLic\CommunityLicence;

/**
 * Community licence test
 */
class CommunityLicenceTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $query = CommunityLicence::create(['id' => 1]);
        $this->assertEquals(1, $query->getId());
    }
}
