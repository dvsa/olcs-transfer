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
                    'GET' => QueryConfig::getConfig(Query\Permits\SectorsList::class),
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
            'ecmt-countries' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-countries[/]'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\EcmtCountriesList::class)
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
            'ecmt-permits-decline' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits-decline[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\DeclineEcmtPermits::class),
                ]
            ],
            'ecmt-permits-accept' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits-accept[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Permits\AcceptEcmtPermits::class),
                ]
            ],
            'ecmt-permits-update-declaration' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits-update-declaration[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateDeclaration::class),
                ]
            ],
            'ecmt-permits-update-answers' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits-update-answers[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateEcmtCheckAnswers::class),
                ]
            ],
            'ecmt-permits-update-sector' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits-update-sector[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateSector::class),
                ]
            ],
            'ecmt-permits-update-international-journey' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'ecmt-permits-update-international-journey[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateInternationalJourney::class),
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
                    'POST' => CommandConfig::getPostConfig(Command\Permits\CreateEcmtPermitApplication::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateEcmtPermitApplication::class),
                    'submit' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'submit[/]',
                        ],
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Permits\EcmtSubmitApplication::class)
                        ]
                    ],
                    'ecmt-cabotage' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'ecmt-cabotage[/]',
                        ],
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateEcmtCabotage::class)
                        ]
                    ],
                    'ecmt-emissions' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'ecmt-emissions[/]',
                        ],
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateEcmtEmissions::class)
                        ]
                    ],
                    'ecmt-restricted-countries' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'ecmt-restricted-countries[/]',
                        ],
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateEcmtCountries::class)
                        ]
                    ],
                    'ecmt-licence' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'ecmt-licence[/]',
                        ],
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateEcmtLicence::class)
                        ]
                    ],
                    'ecmt-permits-required' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'ecmt-permits-required[/]',
                        ],
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateEcmtPermitsRequired::class)
                        ]
                    ],
                    'ecmt-trips' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'ecmt-trips[/]',
                        ],
                        'child_routes' => [
                            'PUT' => CommandConfig::getPutConfig(Command\Permits\UpdateEcmtTrips::class),
                        ]
                    ],
                ]
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
            'last-open-window' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'last-open-window[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Permits\LastOpenWindow::class),
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
        ]
    ]
];
