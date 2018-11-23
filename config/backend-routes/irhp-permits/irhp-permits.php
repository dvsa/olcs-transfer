<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'irhp-permits' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'irhp-permits[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\IrhpPermit\ById::class),
                    'replace' => RouteConfig::getRouteConfig(
                        'replace',
                        ['POST' => CommandConfig::getPostConfig(Command\IrhpPermit\Replace::class)]
                    )
                ]
            ),
            'GET' => QueryConfig::getConfig(Query\IrhpPermit\GetList::class),
            'by-ecmt-id' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'by-ecmt-id[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\IrhpPermit\GetListByEcmtId::class),
                ]
            ],
        ]
    ],
];
