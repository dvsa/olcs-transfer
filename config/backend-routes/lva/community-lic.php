<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'community-lic' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'community-lic[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\CommunityLic\CommunityLic::class),
            'application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'application/',
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
                                    Command\CommunityLic\Application\Create::class
                                ),
                        ]
                    ],
                    'create-office-copy' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'create-office-copy[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' =>
                                CommandConfig::getPostConfig(
                                    Command\CommunityLic\Application\CreateOfficeCopy::class
                                ),
                        ]
                    ],
                ]
            ],
            'licence' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'licence/',
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
                                    Command\CommunityLic\Licence\Create::class
                                ),
                        ]
                    ],
                    'create-office-copy' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'create-office-copy[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' =>
                                CommandConfig::getPostConfig(
                                    Command\CommunityLic\Licence\CreateOfficeCopy::class
                                ),
                        ]
                    ],
                ]
            ],
            'void' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'void[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' =>
                        CommandConfig::getPostConfig(
                            Command\CommunityLic\Void::class
                        ),
                ]
            ],
            'restore' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'restore[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' =>
                        CommandConfig::getPostConfig(
                            Command\CommunityLic\Restore::class
                        ),
                ]
            ],
            'stop' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'stop[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' =>
                        CommandConfig::getPostConfig(
                            Command\CommunityLic\Stop::class
                        ),
                ]
            ],
            'reprint' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'reprint[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' =>
                        CommandConfig::getPostConfig(
                            Command\CommunityLic\Reprint::class
                        ),
                ]
            ],
        ],
    ],
];
