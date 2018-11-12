<?php

namespace Dvsa\OlcsTest\Transfer\Command\Surrender;

use Dvsa\Olcs\Transfer\Command\Surrender\Update;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit_Framework_TestCase;

class UpdateTest extends PHPUnit_Framework_TestCase
{
    use CommandTest;

    protected function createBlankDto()
    {
        return new Update();
    }

    protected function getOptionalDtoFields()
    {
        return [];
    }

    protected function getValidFieldValues()
    {
        return [
            'licence' => ['1', '2'],
            'communityLicenceDocumentStatus' => [
                'doc_sts_lost',
                'doc_sts_stolen',
                'doc_sts_destroyed',
            ],
            'digitalSignature' => ['1', '2'],
            'discDestroyed' => ['0','1','2'],
            'discLost' => ['0','1','2'],
            'discLostInfo' => ['text'],
            'discStolen' => ['0','1','2'],
            'discStolenInfo' => ['text'],
            'licenceDocumentStatus' => [
                'doc_sts_lost',
                'doc_sts_stolen',
                'doc_sts_destroyed',
            ],
            'status' => [
                'surr_sts_approved',
                'surr_sts_comm_lic_docs_complete',
                'surr_sts_contacts_complete',
                'surr_sts_details_confirmed',
                'surr_sts_discs_complete',
                'surr_sts_lic_docs_complete',
                'surr_sts_signed',
                'surr_sts_start',
                'surr_sts_submitted',
            ],
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'licence' => ['0', ['array']],
            'communityLicenceDocumentStatus' => [
                'invalid string',
                ['unexpected' => 'array'],
            ],
            'digitalSignature' => ['0', ['array']],
            'discDestroyed' => [['array']],
            'discLost' => [['array']],
            'discLostInfo' => [['unexpected' => 'array']],
            'discStolen' => [['array']],
            'discStolenInfo' => [['unexpected' => 'array']],
            'licenceDocumentStatus' => [
                'invalid string',
                ['unexpected' => 'array'],
            ],
            'status' => [
                'invalid string',
                ['unexpected' => 'array'],
            ],
        ];
    }


    protected function getFilterTransformations()
    {
        return [
            'licence' => [[99, '99'], ['string', '']],
            'communityLicenceDocumentStatus' => [['doc_sts_lost ', 'doc_sts_lost']],
            'digitalSignature' => [[99, '99'], ['string', '']],
            'discDestroyed' => [[99, '99']],
            'discLost' => [[99, '99']],
            'discLostInfo' => [['text ', 'text']],
            'discStolen' => [[99, '99']],
            'discStolenInfo' => [['text ', 'text']],
            'licenceDocumentStatus' => [['doc_sts_lost ', 'doc_sts_lost']],
            'status' => [['surr_sts_approved ', 'surr_sts_approved']],
        ];
    }
}
