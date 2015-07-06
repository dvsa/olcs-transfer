<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

$routes = [
    'api' => [
        'type' => 'Literal',
        'options' => [
            'route' => '/api/',
            'defaults' => [
                'controller' => 'Api\Generic'
            ]
        ],
        'may_terminate' => false,
        'child_routes' => [
            'legacy-offence' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'cases/:case/legacy-offence[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Cases\LegacyOffenceList::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Cases\LegacyOffence::class),
                        ]
                    ),
                ]
            ],
            'application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'application[/]',
                    'defaults' => [
                        'id' => null,
                    ]
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'named-single' => RouteConfig::getNamedSingleConfig(
                        'application',
                        [
                            'company-subsidiary' => RouteConfig::getRouteConfig(
                                'company-subsidiary',
                                [
                                    'single' => RouteConfig::getSingleConfig(
                                        [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Application\UpdateCompanySubsidiary::class
                                            ),
                                        ]
                                    ),
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Application\DeleteCompanySubsidiary::class
                                    ),
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Application\CreateCompanySubsidiary::class
                                    ),
                                ]
                            ),
                            'workshop' => RouteConfig::getRouteConfig(
                                'workshop',
                                [
                                    'single' => RouteConfig::getSingleConfig(
                                        [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Application\UpdateWorkshop::class
                                            ),
                                        ]
                                    ),
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Application\DeleteWorkshop::class
                                    ),
                                    'POST' => CommandConfig::getPostConfig(Command\Application\CreateWorkshop::class),
                                ]
                            ),
                            'goods-vehicles' => RouteConfig::getRouteConfig(
                                'goods-vehicles',
                                [
                                    'single' => RouteConfig::getSingleConfig(
                                        [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Application\UpdateGoodsVehicle::class
                                            ),
                                        ]
                                    ),
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Application\DeleteGoodsVehicle::class
                                    )
                                ]
                            ),
                        ]
                    ),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Application\Application::class),
                            'type-of-licence' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'type-of-licence[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateTypeOfLicence::class
                                    ),
                                ]
                            ],
                            'addresses' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'addresses[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\Addresses::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\UpdateAddresses::class),
                                ]
                            ],
                            'previous-convictions' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'previous-convictions[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\PreviousConvictions::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdatePreviousConvictions::class
                                    )
                                ]
                            ],
                            'declaration' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'declaration[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\Declaration::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateDeclaration::class
                                    ),
                                ]
                            ],
                            'financial-evidence' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'financial-evidence[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\FinancialEvidence::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateFinancialEvidence::class
                                    ),
                                ]
                            ],
                            'financial-history' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'financial-history[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\FinancialHistory::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateFinancialHistory::class
                                    ),
                                ]
                            ],
                            'licence-history' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'licence-history[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\LicenceHistory::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateLicenceHistory::class
                                    )
                                ]
                            ],
                            'safety' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'safety[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\Safety::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateSafety::class
                                    ),
                                ]
                            ],
                            'transport-managers' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'transport-managers[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\TransportManagers::class),
                                ]
                            ],
                            'outstanding-fees' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'outstanding-fees[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\OutstandingFees::class),
                                ]
                            ],
                            'submit' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'submit[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\SubmitApplication::class),
                                ]
                            ],
                            'vehicle-declaration' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'vehicle-declaration[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\VehicleDeclaration::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateVehicleDeclaration::class
                                    ),
                                ]
                            ],
                            'goods-vehicles' => RouteConfig::getRouteConfig(
                                'goods-vehicles',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Application\GoodsVehicles::class),
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Application\CreateGoodsVehicle::class
                                    ),
                                ]
                            ),
                            'vehicles' => RouteConfig::getRouteConfig(
                                'vehicles',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\UpdateVehicles::class),
                                ]
                            ),
                            'document' => RouteConfig::getRouteConfig(
                                'document',
                                [
                                    'vehicle-list' => RouteConfig::getRouteConfig(
                                        'vehicle-list',
                                        [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Application\CreateVehicleListDocument::class
                                            ),
                                        ]
                                    )
                                ]
                            ),
                            'withdraw' => RouteConfig::getRouteConfig(
                                'withdraw',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\WithdrawApplication::class)
                                ]
                            ),
                            'revive' => RouteConfig::getRouteConfig(
                                'revive',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\ReviveApplication::class)
                                ]
                            ),
                            'refuse' => RouteConfig::getRouteConfig(
                                'refuse',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\RefuseApplication::class)
                                ]
                            ),
                            'not-taken-up' => RouteConfig::getRouteConfig(
                                'not-taken-up',
                                [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\NotTakenUpApplication::class
                                    ),
                                ]
                            ),
                            'review' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'review[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\Review::class)
                                ]
                            ],
                            'overview' => RouteConfig::getRouteConfig(
                                'overview',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Application\Overview::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\Overview::class),
                                ]
                            ),
                            'snapshot' => RouteConfig::getRouteConfig(
                                'snapshot',
                                [
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Application\CreateSnapshot::class
                                    ),
                                ]
                            )
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\Application\CreateApplication::class),
                ]
            ],
            'variation' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'variation[/]',
                    'defaults' => [
                        'id' => null
                    ]
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'named-single' => RouteConfig::getNamedSingleConfig(
                        'application',
                        [
                            'psv-discs' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'psv-discs[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'void' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'void[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'PUT' => CommandConfig::getPutConfig(Command\Variation\VoidPsvDiscs::class),
                                        ]
                                    ],
                                    'replace' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'replace[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Variation\ReplacePsvDiscs::class
                                            ),
                                        ]
                                    ],
                                    'POST' => CommandConfig::getPostConfig(Command\Variation\CreatePsvDiscs::class),
                                ]
                            ],
                        ]
                    ),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Variation\Variation::class),
                            'type-of-licence' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'type-of-licence[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Variation\TypeOfLicence::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Variation\UpdateTypeOfLicence::class),
                                ]
                            ],
                            'addresses' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'addresses[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\Addresses::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Variation\UpdateAddresses::class),
                                ]
                            ],
                            'transport-manager-delete-delta' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'transport-manager-delete-delta[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Variation\TransportManagerDeleteDelta::class
                                    ),
                                ],
                            ],
                            'goods-vehicles' => RouteConfig::getRouteConfig(
                                'goods-vehicles',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Variation\GoodsVehicles::class),
                                ]
                            ),
                        ]
                    ),
                ]
            ],
            'licence' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'licence[/]',
                    'defaults' => [
                        'id' => null
                    ]
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'named-single' => RouteConfig::getNamedSingleConfig(
                        'licence',
                        [
                            'company-subsidiary' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'company-subsidiary[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'single' => RouteConfig::getSingleConfig(
                                        [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Licence\UpdateCompanySubsidiary::class
                                            ),
                                        ]
                                    ),
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Licence\DeleteCompanySubsidiary::class
                                    ),
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Licence\CreateCompanySubsidiary::class
                                    ),
                                ]
                            ],
                            'psv-discs' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'psv-discs[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'void' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'void[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'PUT' => CommandConfig::getPutConfig(Command\Licence\VoidPsvDiscs::class),
                                        ]
                                    ],
                                    'replace' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'replace[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Licence\ReplacePsvDiscs::class
                                            ),
                                        ]
                                    ],
                                    'POST' => CommandConfig::getPostConfig(Command\Licence\CreatePsvDiscs::class),
                                ]
                            ],
                        ]
                    ),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Licence\Licence::class),
                            'decisions' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'decisions[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\LicenceDecisions::class),
                                    'revoke' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'revoke[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'POST' => CommandConfig::getPostConfig(Command\Licence\RevokeLicence::class)
                                        ]
                                    ],
                                    'curtail' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'curtail[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Licence\CurtailLicence::class
                                            )
                                        ]
                                    ],
                                    'suspend' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'suspend[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Licence\SuspendLicence::class
                                            )
                                        ]
                                    ],
                                    'surrender' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'surrender[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Licence\SurrenderLicence::class
                                            )
                                        ]
                                    ],
                                    'reset-to-valid' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'reset-to-valid[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'POST' => CommandConfig::getPostConfig(Command\Licence\ResetToValid::class)
                                        ]
                                    ]
                                ]
                            ],
                            'type-of-licence' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'type-of-licence[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\TypeOfLicence::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Licence\UpdateTypeOfLicence::class),
                                ]
                            ],
                            'addresses' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'addresses[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\Addresses::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Licence\UpdateAddresses::class),
                                ]
                            ],
                            'safety' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'safety[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\Safety::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Licence\UpdateSafety::class
                                    ),
                                ]
                            ],
                            'transport-managers' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'transport-managers[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\TransportManagers::class),
                                ]
                            ],
                            'psv-discs' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'psv-discs[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\PsvDiscs::class),
                                ]
                            ],
                            'goods-vehicles' => RouteConfig::getRouteConfig(
                                'goods-vehicles',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Licence\GoodsVehicles::class),
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Licence\CreateGoodsVehicle::class
                                    ),
                                    'transfer' => RouteConfig::getRouteConfig(
                                        'transfer',
                                        [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Licence\TransferVehicles::class
                                            )
                                        ]
                                    )
                                ]
                            ),
                            'document' => RouteConfig::getRouteConfig(
                                'document',
                                [
                                    'vehicle-list' => RouteConfig::getRouteConfig(
                                        'vehicle-list',
                                        [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Licence\CreateVehicleListDocument::class
                                            ),
                                        ]
                                    )
                                ]
                            ),
                            'other-active-licences' => RouteConfig::getRouteConfig(
                                'other-active-licences',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Licence\OtherActiveLicences::class),
                                ]
                            ),
                            'print-document' => RouteConfig::getRouteConfig(
                                'print-document',
                                [
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Licence\PrintLicence::class
                                    ),
                                ]
                            ),
                            'overview' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'overview[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\Overview::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Licence\Overview::class),
                                ]
                            ],
                        ]
                    ),
                ]
            ],
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
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Bus\BusReg::class),
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
                ]
            ],
            'previous-conviction' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'previous-conviction[/]',
                    'defaults' => [
                        'id' => null
                    ]
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\PreviousConviction\PreviousConviction::class),
                            'PUT' => CommandConfig::getPutConfig(
                                Command\PreviousConviction\UpdatePreviousConviction::class
                            )
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(
                        Command\PreviousConviction\CreatePreviousConviction::class
                    ),
                    'DELETE' => CommandConfig::getDeleteConfig(
                        Command\PreviousConviction\DeletePreviousConviction::class
                    ),
                    'tma' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'tma[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\PreviousConviction\CreateForTma::class),
                        ]
                    ],
                ]
            ],
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
                                ]
                            ),
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
                                ]
                            ),
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
                        ]
                    ]
                ]
            ],
            'publication' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'publication[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'recipient' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'recipient[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'single' => RouteConfig::getSingleConfig(
                                [
                                    'GET' => QueryConfig::getConfig(Query\Publication\Recipient::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Publication\UpdateRecipient::class),
                                ]
                            ),
                            'GET' => QueryConfig::getConfig(Query\Publication\RecipientList::class),
                            'POST' => CommandConfig::getPostConfig(Command\Publication\CreateRecipient::class),
                            'DELETE' => CommandConfig::getDeleteConfig(Command\Publication\DeleteRecipient::class),
                        ]
                    ],
                ],
            ],
            'partner' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'partner[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\User\Partner::class),
                            'PUT' => CommandConfig::getPutConfig(Command\User\UpdatePartner::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\User\PartnerList::class),
                    'POST' => CommandConfig::getPostConfig(Command\User\CreatePartner::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\User\DeletePartner::class),
                ]
            ],
            'processing' => [
                'type' => 'segment',
                'options' => [
                    'route' => 'processing[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'history' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'history[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Processing\History::class),
                        ]
                    ],
                    'note' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'note[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Processing\NoteList::class),
                            'POST' => CommandConfig::getPostConfig(Command\Processing\Note\Create::class),
                            'single' => RouteConfig::getSingleConfig(
                                [
                                    'GET' => QueryConfig::getConfig(Query\Processing\Note::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Processing\Note\Update::class),
                                    'DELETE' => CommandConfig::getDeleteConfig(Command\Processing\Note\Delete::class),
                                ]
                            )
                        ]
                    ]
                ]
            ],
            'other-licence' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'other-licence[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\OtherLicence\OtherLicence::class),
                            'PUT' => CommandConfig::getPutConfig(Command\OtherLicence\UpdateOtherLicence::class),
                            'tma' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'tma[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(Command\OtherLicence\UpdateForTma::class),
                                ]
                            ]
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\OtherLicence\CreateOtherLicence::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\OtherLicence\DeleteOtherLicence::class),
                    'previous-licence' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'previous-licence[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\OtherLicence\CreatePreviousLicence::class),
                        ]
                    ],
                    'tma' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'tma[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\OtherLicence\CreateForTma::class),
                        ]
                    ],
                ]
            ],
            'propose-to-revoke' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'propose-to-revoke[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'case' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'case/:case[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Cases\ProposeToRevoke\ProposeToRevokeByCase::class),
                        ]
                    ],
                    'POST' => CommandConfig::getPostConfig(Command\Cases\ProposeToRevoke\CreateProposeToRevoke::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'PUT' => CommandConfig::getPutConfig(
                                Command\Cases\ProposeToRevoke\UpdateProposeToRevoke::class
                            ),
                        ]
                    )
                ]
            ],
            'prohibition' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'prohibition[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Cases\Prohibition\ProhibitionList::class),
                    'POST' => CommandConfig::getPostConfig(Command\Cases\Prohibition\Create::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Cases\Prohibition\Prohibition::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Cases\Prohibition\Update::class),
                            'DELETE' => CommandConfig::getDeleteConfig(Command\Cases\Prohibition\Delete::class),
                        ]
                    )
                ]
            ],
            'defect' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'defect[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Cases\Prohibition\DefectList::class),
                    'POST' => CommandConfig::getPostConfig(Command\Cases\Prohibition\Defect\Create::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Cases\Prohibition\Defect::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Cases\Prohibition\Defect\Update::class),
                            'DELETE' => CommandConfig::getDeleteConfig(Command\Cases\Prohibition\Defect\Delete::class),
                        ]
                    )
                ]
            ],
            'fee' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'fee[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Fee\Fee::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Fee\UpdateFee::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\Fee\FeeList::class),
                    'POST' => CommandConfig::getPostConfig(Command\Fee\CreateMiscellaneousFee::class),
                ]
            ],
            'payment' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'payment[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'by-reference' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'ref/:reference[/]',
                            'constraints' => [
                                'reference' => 'OLCS-[0-9A-F\-]+',
                            ],
                        ],
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Payment\PaymentByReference::class),
                            'POST' => CommandConfig::getPostConfig(Command\Payment\CompletePayment::class),
                        ],
                    ],
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Payment\Payment::class),
                        ]
                    ),
                    'pay-outstanding-fees' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'pay-outstanding-fees[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\Payment\PayOutstandingFees::class),
                        ],
                    ],
                ]
            ],
            'user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'user[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\User\User::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\User\UserList::class),
                ]
            ],
            'person' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'person[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'PUT' => CommandConfig::getPutConfig(Command\Person\Update::class),
                        ]
                    ),
                ]
            ],
            'tm-employment' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'tm-employment[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\TmEmployment\GetSingle::class),
                            'PUT' => CommandConfig::getPutConfig(Command\TmEmployment\Update::class),
                        ]
                    ),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\TmEmployment\DeleteList::class),
                    'POST' => CommandConfig::getPostConfig(Command\TmEmployment\Create::class),
                ],
            ],
            'case-condition-undertaking' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'cases/:case/condition-undertaking[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Cases\ConditionUndertaking\ConditionUndertakingList::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(
                                Query\Cases\ConditionUndertaking\ConditionUndertaking::class
                            ),
                            'PUT' => CommandConfig::getPutConfig(
                                Command\Cases\ConditionUndertaking\UpdateConditionUndertaking::class
                            ),
                            'DELETE' => CommandConfig::getDeleteConfig(
                                Command\Cases\ConditionUndertaking\DeleteConditionUndertaking::class
                            )
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(
                        Command\Cases\ConditionUndertaking\CreateConditionUndertaking::class
                    )
                ]
            ],
            'bus-reg-history' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'bus-reg-history[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Bus\HistoryList::class)
                ]
            ],
            'change-of-entity' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'change-of-entity[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\ChangeOfEntity\ChangeOfEntity::class),
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\ChangeOfEntity\ChangeOfEntity::class),
                ]
            ],
        ]
    ]
];

$files = array_merge(glob(__DIR__ . '/backend-routes/*/*.php'), glob(__DIR__ . '/backend-routes/*.php'));

foreach ($files as $config) {
    $newRoute = include $config;
    $routes['api']['child_routes'][key($newRoute)] = current($newRoute);
}

return $routes;
