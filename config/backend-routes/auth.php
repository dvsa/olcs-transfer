<?php

use Dvsa\Olcs\Transfer\Command\Auth\Login;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'auth' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'auth[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'login' => RouteConfig::getRouteConfig(
                'login[/]',
                [
                    'POST' => CommandConfig::getPostConfig(Login::class)
                ]
            ),
        ]
    ],
];
