<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'irhp-application' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'irhp-application[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\IrhpApplication\ById::class),
                ]
            ),
            'update-multiple-no-of-permits' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'update-multiple-no-of-permits[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\UpdateMultipleNoOfPermits::class),
                ],
            ],
            'update' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'update[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\Update::class),
                ]
            ],
        ]
    ],
];
