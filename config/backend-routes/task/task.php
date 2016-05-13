<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'task' => RouteConfig::getRouteConfig(
        'task',
        [
            'GET' => QueryConfig::getConfig(Query\Task\TaskList::class),
            'POST' => CommandConfig::getPostConfig(Command\Task\CreateTask::class),
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Task\Task::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Task\UpdateTask::class),
                    'details' => RouteConfig::getRouteConfig(
                        'details',
                        [
                            'GET' => QueryConfig::getConfig(Query\Task\TaskDetails::class),
                        ]
                    )
                ],
                '[0-9]+'
            ),
            'close' => RouteConfig::getRouteConfig(
                'close',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Task\CloseTasks::class),
                ]
            ),
            'reassign' => RouteConfig::getRouteConfig(
                'reassign',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Task\ReassignTasks::class),
                ]
            ),
            // @todo remove after task allocation rules will be tested (OLCS-6844 & OLCS-12638)
            'create-task-temp' => RouteConfig::getRouteConfig(
                'create-task-temp',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Task\CreateTaskTemp::class),
                ]
            ),
        ]
    )
];
