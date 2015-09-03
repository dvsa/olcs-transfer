<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'publication' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'publication[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'recipient' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'recipient[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Publication\Recipient::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Publication\UpdateRecipient::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\Publication\RecipientList::class),
                    'POST' => CommandConfig::getPostConfig(Command\Publication\CreateRecipient::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\Publication\DeleteRecipient::class),
                ]
            ],
            'bus' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'bus[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Publication\Bus::class),
                ]
            ],
            'application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'application[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Publication\Application::class),
                ]
            ],
        ],
    ],
];
