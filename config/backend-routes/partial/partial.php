<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'partial' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'partial[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\PartialMarkup\ById::class),
                    'PUT' => CommandConfig::getPutConfig(Command\PartialMarkup\Update::class),
                ]
            ),
            'GET' => QueryConfig::getConfig(Query\PartialMarkup\GetList::class),
        ]
    ],
];
