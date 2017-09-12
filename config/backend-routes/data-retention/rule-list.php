<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Command\DataRetention\UpdateActionConfirmation;

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
            'update-action-confirmation' => RouteConfig::getRouteConfig(
                'update-action-confirmation',
                [
                    'POST' => CommandConfig::getPostConfig(UpdateActionConfirmation::class),
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
