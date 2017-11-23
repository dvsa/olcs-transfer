<?php

namespace Dvsa\OlcsTest\Transfer\Query\Published;

use Dvsa\Olcs\Transfer\Query\Publication\PublishedList;
use Dvsa\OlcsTest\Transfer\Query\QueryTest;
use PHPUnit_Framework_TestCase;

class PublishedListTest extends PHPUnit_Framework_TestCase
{
    use QueryTest;

    protected function createBlankQuery()
    {
        return new PublishedList();
    }

    protected function getOptionalQueryFields()
    {
        return [
            'pubType',
        ];
    }

    protected function getValidFieldValues()
    {
        return [
            'pubType' => [
                'A&D',
                'N&P',
            ],
        ];
    }

    protected function getFilterTransformations()
    {
        return [
            'pubType' => [' test ' => 'test'],
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'pubType' => ['bad-value'],
        ];
    }
}
