<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'transport-manager-application' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'transport-manager-application[/]',
            'defaults' => [
                'id' => null
            ]
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\TransportManagerApplication\GetDetails::class),
                    'update-status' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'update-status[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(
                                Command\TransportManagerApplication\UpdateStatus::class
                            ),
                        ]
                    ],
                    'update-details' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'update-details[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(
                                Command\TransportManagerApplication\UpdateDetails::class
                            ),
                        ]
                    ],
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\TransportManagerApplication\Create::class),
            'DELETE' => CommandConfig::getDeleteConfig(Command\TransportManagerApplication\Delete::class),
            'GET' => QueryConfig::getConfig(Query\TransportManagerApplication\GetList::class),
        ]
    ],
];
