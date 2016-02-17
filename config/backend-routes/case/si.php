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
            'compliance-episode' => RouteConfig::getRouteConfig(
                'compliance-episode',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Cases\Si\ComplianceEpisode::class)
                ]
            ),
            'GET' => QueryConfig::getConfig(Query\Cases\Si\GetList::class),
        ]
    )
];
