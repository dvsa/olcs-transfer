<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'irhp-application' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'irhp-application[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\IrhpApplication\ById::class),
                    'countries' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'countries[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\UpdateCountries::class),
                        ]
                    ],
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\IrhpApplication\Create::class),
            'licence' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'licence[/]',
                ],
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\UpdateLicence::class),
                    'active' => RouteConfig::getRouteConfig(
                        'active',
                        [
                            'GET' => QueryConfig::getConfig(Query\IrhpApplication\ActiveApplication::class),
                        ]
                    ),
                ]
            ],
            'update-multiple-no-of-permits' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'update-multiple-no-of-permits[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\UpdateMultipleNoOfPermits::class),
                ],
            ],
            'update-declaration' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'update-declaration[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\UpdateDeclaration::class),
                ],
            ],
            'update-check-answers' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'update-check-answers[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\UpdateCheckAnswers::class),
                ]
            ],
            'submit-application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'submit-application[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\SubmitApplication::class),
                ]
            ],
            'max-stock-permits' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'max-stock-permits[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\IrhpApplication\MaxStockPermits::class),
                ]
            ],
            'max-stock-permits-by-application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'max-stock-permits-by-application[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\IrhpApplication\MaxStockPermitsByApplication::class),
                ]
            ],
            'GET' => QueryConfig::getConfig(Query\IrhpApplication\GetList::class),
            'cancel-application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'cancel-application[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\IrhpApplication\CancelApplication::class),
                ]
            ],
            'full' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'full[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\IrhpApplication\CreateFull::class),
                    'PUT' => CommandConfig::getPutConfig(Command\IrhpApplication\UpdateFull::class),
                ]
            ],
        ]
    ],
];
