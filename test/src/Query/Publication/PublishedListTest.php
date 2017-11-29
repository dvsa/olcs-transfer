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

    protected function getValidFieldValues()
    {
        return [
            'pubType' => [
                'A&D',
                'N&P',
            ],
            'pubDateMonth' => [
                '1',
                '01',
                '2',
                '02',
                '11',
                '12',
            ],
            'pubDateYear' => [
                '2017',
                '2199',
                '0',
            ],
        ];
    }

    protected function getOptionalQueryFields()
    {
        return [
            'pubType',
        ];
    }

    protected function getFilterTransformations()
    {
        return [
            'pubType' => [[' test ', 'test']],
            'pubDateMonth' => [
                [12, '12'],
                [' a1b2c3 ', '123'],
            ],
            'pubDateYear' => [
                [12, '12'],
                [' a1b2c3 ', '123'],
                ['-1', '1'],
            ],
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'pubType' => ['bad-value'],
            'pubDateMonth' => [0, 13, [], false, null, ''],
            'pubDateYear' => [[], false, null, ''],
        ];
    }
}
