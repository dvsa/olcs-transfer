<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'si' => RouteConfig::getRouteConfig(
        'case/si',
        [
            'send-response' => RouteConfig::getRouteConfig(
                'send-response',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Cases\Si\SendResponse::class)
                ]
            ),
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Cases\Si\Si::class),
                ]
            ),
            'GET' => QueryConfig::getConfig(Query\Cases\Si\GetList::class),
        ]
    )
];
