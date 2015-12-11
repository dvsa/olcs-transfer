<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'fee-type' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'fee-type[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Fee\FeeType::class),
                ]
            ),
            'latest' => RouteConfig::getRouteConfig(
                'latest',
                [
                    'GET' => QueryConfig::getConfig(Query\Fee\GetLatestFeeType::class),
                ]
            ),
            'GET' => QueryConfig::getConfig(Query\Fee\FeeTypeList::class),
        ]
    ],
];
