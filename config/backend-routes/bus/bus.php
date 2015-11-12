<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'bus' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'bus[/]',
            'defaults' => [
                'id' => null
            ]
        ],
        'may_terminate' => false,
        'child_routes' => [
            'POST' => CommandConfig::getPostConfig(Command\Bus\CreateBus::class),
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Bus\BusReg::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\Bus\DeleteBus::class),
                    'variation' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'variation[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\Bus\CreateVariation::class),
                        ]
                    ],
                    'cancellation' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'cancellation[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\Bus\CreateCancellation::class),
                        ]
                    ],
                    'stops' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'stops[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Bus\UpdateStops::class),
                        ]
                    ],
                    'quality' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'quality[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Bus\UpdateQualitySchemes::class),
                        ]
                    ],
                    'service-details' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'service-details[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Bus\UpdateServiceDetails::class)
                        ]
                    ],
                    'service-register' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'service-register[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Bus\UpdateServiceRegister::class)
                        ]
                    ],
                    'ta' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'ta[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Bus\UpdateTaAuthority::class)
                        ]
                    ],
                    'short-notice' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'short-notice[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Bus\ShortNoticeByBusReg::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Bus\UpdateShortNotice::class)
                        ]
                    ],
                    'decision' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'decision[/]'
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Bus\BusRegDecision::class),
                            'reset' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'reset[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Bus\ResetBusReg::class)
                                ]
                            ],
                            'admin-cancel' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'admin-cancel[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Bus\AdminCancelBusReg::class)
                                ]
                            ],
                            'withdraw' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'withdraw[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Bus\WithdrawBusReg::class)
                                ]
                            ],
                            'refuse' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'refuse[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Bus\RefuseBusReg::class)
                                ]
                            ],
                            'refuse-by-short-notice' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'refuse-by-short-notice[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Bus\RefuseBusRegByShortNotice::class)
                                ]
                            ],
                            'grant' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'grant[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Bus\GrantBusReg::class)
                                ]
                            ],
                        ]
                    ],
                    'request-map' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'request-map[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\Bus\Ebsr\RequestMap::class),
                        ]
                    ],
                ],
                '[0-9]+'
            ),
            'process-ebsr-packs' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'process-packs[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Bus\Ebsr\ProcessPacks::class),
                ]
            ],
            'registration-history-list' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'registration-history-list[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Bus\RegistrationHistoryList::class),
                ]
            ],
            'paginated-registration-history-list' => RouteConfig::getRouteConfig(
                'paginated-registration-history-list',
                [
                    'GET' => QueryConfig::getConfig(Query\Bus\PaginatedRegistrationHistoryList::class),
                ]
            ),
        ]
    ]
];
