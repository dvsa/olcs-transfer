<?php

namespace Dvsa\OlcsTest\Transfer\Command\Document;

use Dvsa\Olcs\Transfer\Command\Document\Upload;
use PHPUnit_Framework_TestCase;

/**
 * @covers Dvsa\Olcs\Transfer\Command\Document\Upload
 */
class UploadTest extends PHPUnit_Framework_TestCase
{
    public function testStructure()
    {
        $filename = 'filename';
        $content = 'content';
        $irfoOrganisation = 1;
        $submission = 2;
        $trafficArea = 'B';
        $operatingCentre = 3;
        $opposition = 4;
        $category = 5;
        $subCategory = 6;
        $description = 'description';
        $isExternal = 1;
        $isScan = 1;
        $isEbsrPack = 1;
        $issuedDate = '01/01/2017';
        $user = 7;
        $shouldUploadOnly = true;

        $data = [
            'filename' => $filename,
            'content' => $content,
            'irfoOrganisation' => $irfoOrganisation,
            'submission' => $submission,
            'trafficArea' => $trafficArea,
            'operatingCentre' => $operatingCentre,
            'opposition' => $opposition,
            'category' => $category,
            'subCategory' => $subCategory,
            'description' => $description,
            'isExternal' => $isExternal,
            'isScan' => $isScan,
            'isEbsrPack' => $isEbsrPack,
            'issuedDate' => $issuedDate,
            'user' => $user,
            'shouldUploadOnly' => $shouldUploadOnly,
        ];

        /** @var Upload $command */
        $command = Upload::create($data);

        static::assertEquals($filename, $command->getFilename());
        static::assertEquals($content, $command->getContent());
        static::assertEquals($irfoOrganisation, $command->getIrfoOrganisation());
        static::assertEquals($submission, $command->getSubmission());
        static::assertEquals($trafficArea, $command->getTrafficArea());
        static::assertEquals($operatingCentre, $command->getOperatingCentre());
        static::assertEquals($opposition, $command->getOpposition());
        static::assertEquals($category, $command->getCategory());
        static::assertEquals($subCategory, $command->getSubCategory());
        static::assertEquals($description, $command->getDescription());
        static::assertEquals($isExternal, $command->getIsExternal());
        static::assertEquals($isScan, $command->getIsScan());
        static::assertEquals($isEbsrPack, $command->getIsEbsrPack());
        static::assertEquals($issuedDate, $command->getIssuedDate());
        static::assertEquals($user, $command->getUser());
        static::assertEquals($shouldUploadOnly, $command->getShouldUploadOnly());
    }
}
