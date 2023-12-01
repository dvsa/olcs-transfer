<?php

namespace Dvsa\OlcsTest\Transfer\Command\VariationOperatingCentre;

use DateTime;
use Dvsa\Olcs\Transfer\Command\VariationOperatingCentre\Update;
use Dvsa\OlcsTest\Transfer\Command\CommandTest;
use PHPUnit\Framework\TestCase;

class UpdateTest extends TestCase
{
    use CommandTest;

    /**
     * {@inheritdoc}
     */
    protected function createBlankDto()
    {
        return new Update();
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptionalDtoFields()
    {
        return [
            'taIsOverridden',
            'address',
            'noOfTrailersRequired',
            'permission',
            'adPlaced',
            'adPlacedIn',
            'adPlacedDate'
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getValidFieldValues()
    {
        $now = new DateTime();
        $yesterday = new DateTime('yesterday');
        $format = 'Y-m-d';

        return [
            'taIsOverridden' => ['Y', 'N'],
            'application' => ['1', '2'],
            'id' => ['1', '2'],
            'noOfVehiclesRequired' => ['1', '1000000'],
            'noOfTrailersRequired' => ['1', '1000000'],
            'address' => [
                [
                    'id' => null,
                    'version' => null,
                    'addressLine1' => 'test',
                    'addressLine2' => null,
                    'addressLine3' => null,
                    'addressLine4' => null,
                    'town' => 'test',
                    'postcode' => null,
                    'countryCode' => 'GB',
                ]
            ],
            'permission' => ['Y', 'N'],
            'adPlaced' => ['0', '1', '2'],
            'adPlacedIn' => ['string'],
            'adPlacedDate' => [
                $now->format($format),
                $yesterday->format($format)
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getInvalidFieldValues()
    {
        return [
            'taIsOverridden' => [0],
            'application' => [0],
            'address' => [
                [
                    'id' => null,
                    'version' => null,
                    'addressLine1' => '',
                    'addressLine2' => null,
                    'addressLine3' => null,
                    'addressLine4' => null,
                    'town' => 'test',
                    'postcode' => null,
                    'countryCode' => 'GB',
                ]
            ],
            'noOfVehiclesRequired' => ['-1', '1000001'],
            'noOfTrailersRequired' => ['-1', '1000001'],
            'permission' => ['T'],
            'adPlaced' => [3]
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getFilterTransformations()
    {
        return [
            'application' => [[99, '99'], ['string', '']],
            'id' => [[' 99 ', '99']],
            'taIsOverridden' => [['Y ', 'Y']],
            'id' => [[99, '99'], [' 98 ', '98']],
            'permission' => [[99, '99'], [' Y', 'Y']]
        ];
    }
}
