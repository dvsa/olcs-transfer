<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'data-retention' => RouteConfig::getRouteConfig(
        'data-retention',
        [
            'GET' => QueryConfig::getConfig(Query\DataRetention\RuleList::class),
            'rule-list' => RouteConfig::getRouteConfig(
                'rule-list',
                [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\DataRetention\GetRule::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\DataRetention\RuleList::class),
                ]
            ),
            'processed-list' => RouteConfig::getRouteConfig(
                'processed-list',
                [
                    'GET' => QueryConfig::getConfig(Query\DataRetention\GetProcessedList::class),
                ]
            ),
        ]
    ),
];
