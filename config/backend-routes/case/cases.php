<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'cases' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'cases[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Cases\Cases::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Cases\UpdateCase::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\Cases\DeleteCase::class),
                    'pi' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'pi[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Cases\Pi::class),
                            'agreed' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'agreed[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Cases\UpdatePiAgreedAndLegislation::class
                                    ),
                                ]
                            ]
                        ]
                    ],
                    'opposition-dates' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'opposition-dates[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Cases\CasesWithOppositionDates::class)
                        ]
                    ],
                    'licence' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'licence[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Cases\CasesWithLicence::class)
                        ]
                    ],
                    'conviction-note' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'conviction-note[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Cases\UpdateConvictionNote::class),
                        ]
                    ],
                    'prohibition-note' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'prohibition-note[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Cases\UpdateProhibitionNote::class),
                        ]
                    ],
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\Cases\CreateCase::class),
            'by-transport-manager' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'by-transport-manager[/]'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Cases\ByTransportManager::class)
                ]
            ],
            'by-licence' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'by-licence[/]'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Cases\ByLicence::class)
                ]
            ],
        ]
    ]
];
