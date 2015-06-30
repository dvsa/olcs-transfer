<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Query;

return [
    'inspection-request' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'inspection-request[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'create' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'create[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' =>
                        CommandConfig::getPostConfig(
                            Command\InspectionRequest\Create::class
                        ),
                ]
            ],
            'create-from-grant' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'create-from-grant[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' =>
                        CommandConfig::getPostConfig(
                            Command\InspectionRequest\CreateFromGrant::class
                        ),
                ]
            ],
            'operating-centres' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'operating-centres[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\InspectionRequest\OperatingCentres::class),
                ]
            ],
        ],
    ],
];
