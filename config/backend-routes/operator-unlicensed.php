<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'operator-unlicensed' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'operator-unlicensed[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Operator\UnlicensedBusinessDetails::class),
                    // 'PUT' => CommandConfig::getPutConfig(Command\Operator\Update::class),
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\Operator\CreateUnlicensed::class)
        ]
    ]
];
