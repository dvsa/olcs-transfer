<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'pi' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'pi[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Cases\Pi::class),
                    'agreed' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'agreed[/]'
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(
                                Command\Cases\Pi\UpdateAgreedAndLegislation::class
                            ),
                        ]
                    ],
                    'decision' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'decision[/]'
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Cases\Pi\UpdateDecision::class)
                        ]
                    ]
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\Cases\Pi\CreateAgreedAndLegislation::class)
        ],
    ]
];
