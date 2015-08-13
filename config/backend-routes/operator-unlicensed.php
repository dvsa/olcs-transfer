<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'operator-unlicensed' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'operator-unlicensed[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Operator\UnlicensedBusinessDetails::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Operator\UpdateUnlicensed::class),
                ]
            ),
            'named-single' => RouteConfig::getNamedSingleConfig(
                'organisation',
                [
                    'vehicles' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'vehicles[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Operator\UnlicensedVehicles::class),
                        ],
                    ],
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\Operator\CreateUnlicensed::class)
        ]
    ]
];
