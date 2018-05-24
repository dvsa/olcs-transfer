<?php
/**
 * Created by PhpStorm.
 * User: parthvyas
 * Date: 22/05/2018
 * Time: 14:25
 */

namespace Dvsa\OlcsTest\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Command\Licence\DeleteUpdateOptOutTmLetter;
use PHPUnit_Framework_TestCase;

/**
 * @covers Dvsa\Olcs\Transfer\Command\Licence\DeleteUpdateOptOutTmLetter
 */
class DeleteUpdateOptOutTmLetterTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $data = [
            'id' => 29,
            'yesNo' => 'Y',
        ];

        $command = DeleteUpdateOptOutTmLetter::create($data);

        $this->assertEquals(29, $command->getId());
        $this->assertEquals('Y', $command->getYesNo());
    }
}