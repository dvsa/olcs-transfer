<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'appeal' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'cases/:case/appeal[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(
                Query\Cases\Hearing\AppealList::class
            ),
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(
                        Query\Cases\Hearing\Appeal::class
                    ),
                    'PUT' => CommandConfig::getPutConfig(
                        Command\Cases\Hearing\UpdateAppeal::class
                    ),
                    'DELETE' => CommandConfig::getDeleteConfig(
                        Command\Cases\Hearing\DeleteAppeal::class
                    )
                ]
            ),
            'POST' => CommandConfig::getPostConfig(
                Command\Cases\Hearing\CreateAppeal::class
            )
        ]
    ]
];
