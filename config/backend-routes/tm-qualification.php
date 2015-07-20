<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'tm-qualification' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'tm-qualification[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\TmQualification\TmQualification::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\TmQualification\Delete::class),
                    'PUT' => CommandConfig::getPutConfig(Command\TmQualification\Update::class),
                ]
            ),
            'transport-manager' => RouteConfig::getRouteConfig(
                'transport-manager',
                [
                    'named-single' => RouteConfig::getNamedSingleConfig(
                        'transportManager',
                        [
                            'GET' => QueryConfig::getConfig(Query\TmQualification\TmQualificationsList::class),
                            'child_routes' => [
                                'documents' => [
                                    'type' => 'Segment',
                                    'options' => [
                                        'route' => 'documents[/]',
                                    ],
                                    'may_terminate' => false,
                                    'child_routes' => [
                                        'GET' =>
                                            QueryConfig::getConfig(Query\TmQualification\Documents::class)
                                    ]
                                ],
                            ]
                        ]
                    )
                ]
            ),
            'create' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'create[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' =>
                        CommandConfig::getPostConfig(
                            Command\TmQualification\Create::class
                        ),
                ]
            ],
        ],
    ],
];
