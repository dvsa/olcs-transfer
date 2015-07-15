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
                ]
            ),
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
            'by-route-no' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'by-route-no[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Bus\ByRouteNo::class),
                ]
            ],
            'previous-variation-by-route-no' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'previous-variation-by-route-no[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Bus\PreviousVariationByRouteNo::class),
                ]
            ]
        ]
    ]
];
