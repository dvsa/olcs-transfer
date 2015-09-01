<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;
use Dvsa\Olcs\Transfer\Query;

return [
    'transport-manager' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'transport-manager/',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Tm\TransportManager::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Tm\Update::class),
                    'documents' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'documents[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' =>
                                QueryConfig::getConfig(Query\Tm\Documents::class)
                        ]
                    ],
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
                            Command\Tm\Create::class
                        ),
                ]
            ],
            'remove' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'remove[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' =>
                        CommandConfig::getPostConfig(
                            Command\Tm\Remove::class
                        ),
                ]
            ],
        ],
    ],
];
