<?php

namespace Dvsa\OlcsTest\Transfer\Command\Operator;

use Dvsa\Olcs\Transfer\Command\Submission\AssignSubmission;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit_Framework_TestCase;

class AssignSubmissionTest extends PHPUnit_Framework_TestCase
{
    use CommandTest;

    protected function createBlankDto()
    {
        return new AssignSubmission();
    }

    protected function getOptionalDtoFields()
    {
        return ['assignedDate'];
    }

    protected function getValidFieldValues()
    {
        return [
            'assignedDate' => ["2017-01-01", "2015-01-01"],
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'assignedDate' => [['unexpected' => 'array']],
        ];
    }


    protected function getFilterTransformations()
    {

        return [
            'assignedDate' => [' string', 'string'],
            'recipientUser' => [99, '99'],
            'urgent' => [' Y', 'Y']
        ];
    }
}
