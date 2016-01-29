<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'nr' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'nr[/]',
            'defaults' => [
                'id' => null
            ]
        ],
        'may_terminate' => false,
        'child_routes' => [
            'repute' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'repute[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Nr\ReputeUrl::class),
                ]
            ]
        ]
    ]
];
