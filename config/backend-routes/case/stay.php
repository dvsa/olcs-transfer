<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'stay' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'cases/:case/stay[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(
                Query\Cases\Hearing\StayList::class
            ),
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(
                        Query\Cases\Hearing\Stay::class
                    ),
                    'PUT' => CommandConfig::getPutConfig(
                        Command\Cases\Hearing\UpdateStay::class
                    ),
                    'DELETE' => CommandConfig::getDeleteConfig(
                        Command\Cases\Hearing\DeleteStay::class
                    )
                ]
            ),
            'POST' => CommandConfig::getPostConfig(
                Command\Cases\Hearing\CreateStay::class
            )
        ]
    ]
];
