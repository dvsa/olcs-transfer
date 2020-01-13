<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'permits' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'permits[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'sectors' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'sectors[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\Sectors::class),
                ]
            ],
            'ecmt-application-by-licence' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-application-by-licence[/]'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\EcmtApplicationByLicence::class)
                ]
            ],
            'ecmt-constrained-countries' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-constrained-countries[/]'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\EcmtConstrainedCountriesList::class)
                ]
            ],
            'ecmt-permits' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\EcmtPermits::class),
                    'POST' => CommandConfig::getPostConfig(Command\Permits\CreateEcmtPermits::class),
                ]
            ],
            'ecmt-permits-cancel' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits-cancel[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\CancelEcmtPermitApplication::class),
                ]
            ],
            'ecmt-permits-withdraw' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits-withdraw[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\WithdrawEcmtPermitApplication::class),
                ]
            ],
            'irhp-permits-accept' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'irhp-permits-accept[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\AcceptIrhpPermits::class),
                ]
            ],
            'queue-run-scoring' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'queue-run-scoring[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\QueueRunScoring::class),
                ]
            ],
            'queue-accept-scoring' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'queue-accept-scoring[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\QueueAcceptScoring::class),
                ]
            ],
            'ecmt-full-permit-application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-full-permit-application[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\CreateFullPermitApplication::class),
                ]
            ],
            'ecmt-permit-application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permit-application[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\EcmtPermitApplication::class),
                ],
            ],
            'single' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'single[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\ById::class),
                ]
            ],
            'ecmt-permit-fees' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permit-fees[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\EcmtPermitFees::class),
                ]
            ],
            'valid-ecmt' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'valid-ecmt[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\ValidEcmtPermits::class),
                ]
            ],
            'unpaid-ecmt' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'unpaid-ecmt[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\UnpaidEcmtPermits::class),
                ]
            ],
            'available-types' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'available-types[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\AvailableTypes::class),
                ]
            ],
            'available-years' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'available-years[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\AvailableYears::class),
                ]
            ],
            'available-stocks' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'available-stocks[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\AvailableStocks::class),
                ]
            ],
            'emissions-by-year' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'emissions-by-year[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\EmissionsByYear::class),
                ]
            ],
            'open-windows' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'open-windows[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\OpenWindows::class),
                ]
            ],
            'stock-operations-permitted' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'stock-operations-permitted[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\StockOperationsPermitted::class),
                ]
            ],
            'ready-to-print-type' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ready-to-print-type[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\ReadyToPrintType::class),
                ]
            ],
            'ready-to-print-country' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ready-to-print-country[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\ReadyToPrintCountry::class),
                ]
            ],
            'ready-to-print-stock' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ready-to-print-stock[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\ReadyToPrintStock::class),
                ]
            ],
            'ready-to-print' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ready-to-print[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\ReadyToPrint::class),
                ]
            ],
            'ready-to-print-confirm' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ready-to-print-confirm[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\ReadyToPrintConfirm::class),
                ]
            ],
            'print' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'print[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\PrintPermits::class),
                ]
            ],
        ]
    ]
];
