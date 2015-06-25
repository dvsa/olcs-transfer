<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'organisation' => RouteConfig::getRouteConfig(
        'organisation',
        [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Organisation\Organisation::class),
                    'business-type' => RouteConfig::getRouteConfig(
                        'business-type',
                        [
                            'PUT' => CommandConfig::getPutConfig(Command\Organisation\UpdateBusinessType::class),
                        ]
                    ),
                    'business-details' => RouteConfig::getRouteConfig(
                        'business-details',
                        [
                            'GET' => QueryConfig::getConfig(Query\Organisation\BusinessDetails::class),
                        ]
                    ),
                    'outstanding-fees' => RouteConfig::getRouteConfig(
                        'outstanding-fees',
                        [
                            'GET' => QueryConfig::getConfig(Query\Organisation\OutstandingFees::class),
                        ]
                    )
                ]
            ),
            'business-details' => RouteConfig::getRouteConfig(
                'business-details',
                [
                    'licence' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'licence/:id[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Licence\BusinessDetails::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Licence\UpdateBusinessDetails::class),
                        ]
                    ],
                    'application' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'application/:id[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Application\UpdateBusinessDetails::class),
                        ]
                    ]
                ]
            )
        ]
    )
];
