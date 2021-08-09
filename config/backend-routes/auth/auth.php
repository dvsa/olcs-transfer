<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'auth' => RouteConfig::getRouteConfig(
        'auth',
        [
            'login' => RouteConfig::getRouteConfig(
                'login',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Auth\Login::class),
                ]
            )
        ]
    )
];
