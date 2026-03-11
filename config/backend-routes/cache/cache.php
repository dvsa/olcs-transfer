<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'cache' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'cache[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\Cache\ById::class),
            'clear' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'clear',
                    'defaults' => [
                        'controller' => 'Api\Generic',
                    ],
                ],
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Cache\Clear::class),
                ],
            ],
        ],
    ],
];
