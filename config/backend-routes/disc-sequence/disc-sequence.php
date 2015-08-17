<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;
use Dvsa\Olcs\Transfer\Query;

return [
    'disc-sequence' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'disc-sequence/',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'disc-prefix' => RouteConfig::getRouteConfig(
                'disc-prefix',
                [
                    'GET' => QueryConfig::getConfig(Query\DiscSequence\DiscPrefix::class)
                ]
            ),
        ],
    ],
];
