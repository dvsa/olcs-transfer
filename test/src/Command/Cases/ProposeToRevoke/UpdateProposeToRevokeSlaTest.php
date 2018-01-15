<?php


namespace Dvsa\OlcsTest\Transfer\Command\Cases\ProposeToRevoke;


use Dvsa\Olcs\Api\Domain\CommandHandler\Cases\ProposeToRevoke\UpdateProposeToRevokeSla;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;

class UpdateProposeToRevokeSlaTest extends \PHPUnit_Framework_TestCase
{
    use CommandTest;


    protected function createBlankDto()
    {
        return new UpdateProposeToRevokeSla();
    }

    protected function getOptionalDtoFields()
    {
        return [];
    }

    protected function getValidFieldValues()
    {
        return [
            'id' => [1],
            'version' => [1],
            'isSubmissionRequiredForApproval' => [
                0
            ],
            'approvalSubmissionReturnedDate' => [['day' => '11', 'month' => '11', 'year' => '2017']],
            'approvalSubmissionPresidingTc' => [['day' => '11', 'month' => '11', 'year' => '2017']],
            'iorLetterIssuedDate' => [['day' => '11', 'month' => '11', 'year' => '2017']],
            'operatorResponseDueDate' => [['day' => '11', 'month' => '11', 'year' => '2017']],
            'operatorResponseReceivedDate' => [['day' => '11', 'month' => '11', 'year' => '2017']],
            'isSubmissionRequiredForAction' => [1],
            'finalSubmissionIssuedDate' => ['day' => '11', 'month' => '11', 'year' => '2017'],
            'finalSubmissionReturnedDate' => ['day' => '11', 'month' => '11', 'year' => '2017'],
            'finalSubmissionPresidingTc' => [41],
            'actionToBeTaken' => [0],
            'revocationLetterIssuedDate',
            'nfaLetterIssuedDate',
            'warningLetterIssuedDate',
            'piAgreedDate',
            'otherActionAgreedDate'
        ];
    }

    protected function getInvalidFieldValues()
    {
        // TODO: Implement getInvalidFieldValues() method.
    }

    protected function getFilterTransformations()
    {
        // TODO: Implement getFilterTransformations() method.
    }
}