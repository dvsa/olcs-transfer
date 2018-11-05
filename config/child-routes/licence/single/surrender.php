<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'surrender' => RouteConfig::getRouteConfig(
        'surrender',
        [
            'POST' => CommandConfig::getPostConfig(
                Command\Surrender\Create::class
            ),
            'PUT' => CommandConfig::getPutConfig(
                Command\Surrender\Update::class
            ),
            'status' => RouteConfig::getRouteConfig(
                'status',
                [
                    'GET' => QueryConfig::getConfig(Dvsa\Olcs\Transfer\Query\Surrender\GetStatus::class),
                ]
            )
        ]
    ),
];
