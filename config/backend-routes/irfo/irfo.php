<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'irfo' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'irfo[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Irfo\IrfoDetails::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\UpdateIrfoDetails::class),
                ]
            ),
            'gv-permit' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'gv-permit[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Irfo\IrfoGvPermit::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Irfo\UpdateIrfoGvPermit::class),
                            'reset' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'reset[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\ResetIrfoGvPermit::class),
                                ]
                            ],
                            'approve' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'approve[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\ApproveIrfoGvPermit::class),
                                ]
                            ],
                            'withdraw' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'withdraw[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\WithdrawIrfoGvPermit::class),
                                ]
                            ],
                            'refuse' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'refuse[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\RefuseIrfoGvPermit::class),
                                ]
                            ],
                        ]
                    ),
                    'type-list' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'type-list[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Irfo\IrfoGvPermitTypeList::class),
                        ]
                    ],
                    'GET' => QueryConfig::getConfig(Query\Irfo\IrfoGvPermitList::class),
                    'POST' => CommandConfig::getPostConfig(Command\Irfo\CreateIrfoGvPermit::class),
                ]
            ],
            'psv-auth' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'psv-auth[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Irfo\IrfoPsvAuth::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Irfo\UpdateIrfoPsvAuth::class),
                            'grant' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'grant[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\GrantIrfoPsvAuth::class),
                                ]
                            ],
                            'refuse' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'refuse[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\RefuseIrfoPsvAuth::class),
                                ]
                            ],
                            'withdraw' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'withdraw[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\WithdrawIrfoPsvAuth::class),
                                ]
                            ],
                            'cns' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'cns[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\CnsIrfoPsvAuth::class),
                                ]
                            ],
                            'reset' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'reset[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\ResetIrfoPsvAuth::class),
                                ]
                            ],
                        ]
                    ),
                    'type-list' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'type-list[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Irfo\IrfoPsvAuthTypeList::class),
                        ]
                    ],
                    'GET' => QueryConfig::getConfig(Query\Irfo\IrfoPsvAuthList::class),
                    'POST' => CommandConfig::getPostConfig(Command\Irfo\CreateIrfoPsvAuth::class),
                ]
            ],
            'permit-stock' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'permit-stock[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Irfo\IrfoPermitStockList::class),
                    'POST' => CommandConfig::getPostConfig(Command\Irfo\CreateIrfoPermitStock::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Irfo\UpdateIrfoPermitStock::class),
                ]
            ],
            'country-list' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'country-list[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Irfo\IrfoCountryList::class),
                ]
            ]
        ]
    ],
];
