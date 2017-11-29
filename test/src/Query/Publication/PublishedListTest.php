<?php

namespace Dvsa\OlcsTest\Transfer\Query\Published;

use DateTime;
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
            'pubDateFrom' => [
                '2015-12-13 12:24:56',
                new DateTime('2015-12-13 15:45'),
            ],
            'pubDateTo' => [
                '2015-12-13 12:24:56',
                new DateTime('2015-12-13 15:45'),
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
        ];
    }

    protected function getInvalidFieldValues()
    {
        return [
            'pubType' => ['bad-value'],
            'pubDateFrom' => ['2015-12-13', '2015-13-13 12:24:56', 0, [], false, null, ''],
            'pubDateTo' => ['2015-12-13', '2015-13-13 12:24:56', 0, [], false, null, ''],
        ];
    }
}
