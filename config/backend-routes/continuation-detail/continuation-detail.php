<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'continuation-detail' => RouteConfig::getRouteConfig(
        'continuation-detail',
        [
            'single' => RouteConfig::getSingleConfig(
                [
                    'PUT' => CommandConfig::getPutConfig(Command\ContinuationDetail\Update::class),
                ]
            ),
            'checklist-reminders' => RouteConfig::getRouteConfig(
                'checklist-reminders',
                [
                    'GET' => QueryConfig::getConfig(Query\ContinuationDetail\ChecklistReminders::class)
                ]
            ),
            'queue' =>  RouteConfig::getRouteConfig(
                'queue',
                [
                    'POST' => CommandConfig::getPostConfig(Command\ContinuationDetail\Queue::class)
                ]
            ),
            'prepare-continuations' =>  RouteConfig::getRouteConfig(
                'prepare-continuations',
                [
                    'POST' => CommandConfig::getPostConfig(Command\ContinuationDetail\PrepareContinuations::class)
                ]
            ),
            'list' => RouteConfig::getRouteConfig(
                'list',
                [
                    'GET' => QueryConfig::getConfig(Query\ContinuationDetail\GetList::class)
                ]
            ),
        ]
    )
];
