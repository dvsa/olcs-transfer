<?php

use Dvsa\Olcs\Transfer\Command\Auth\ChangeExpiredPassword;
use Dvsa\Olcs\Transfer\Command\Auth\ChangePassword;
use Dvsa\Olcs\Transfer\Command\Auth\Login;
use Dvsa\Olcs\Transfer\Command\Auth\RefreshToken;
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
            'change-password' => RouteConfig::getRouteConfig(
                'change-password',
                [
                    'POST' => CommandConfig::getPostConfig(ChangePassword::class)
                ]
            ),
            'refresh-token' => RouteConfig::getRouteConfig(
                'refresh-token',
                [
                    'POST' => CommandConfig::getPostConfig(RefreshToken::class)
                ]
            ),
            'change-expired-password' => RouteConfig::getRouteConfig(
                'change-expired-password',
                [
                    'POST' => CommandConfig::getPostConfig(ChangeExpiredPassword::class)
                ]
            ),
        ]
    ],
];
