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
                            'operating-centre' => RouteConfig::getRouteConfig(
                                'operating-centre',
                                [
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Application\CreateOperatingCentre::class
                                    ),
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Application\DeleteOperatingCentres::class
                                    ),
                                ]
                            ),
                            'variation-operating-centre' => RouteConfig::getRouteConfig(
                                'variation-operating-centre',
                                [
                                    'single' => RouteConfig::getSingleConfig(
                                        [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\VariationOperatingCentre\Update::class
                                            ),
                                            'restore' => RouteConfig::getRouteConfig(
                                                'restore',
                                                [
                                                    'PUT' => CommandConfig::getPutConfig(
                                                        Command\Variation\RestoreOperatingCentre::class
                                                    ),
                                                ]
                                            )
                                        ]
                                    ),
                                ]
                            ),
                            'psv-vehicles' => RouteConfig::getRouteConfig(
                                'psv-vehicles',
                                [
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Application\CreatePsvVehicle::class
                                    ),
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Application\DeletePsvVehicle::class
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
                                    )
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
                            ),
                            'enforcement-area' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'enforcement-area[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Application\EnforcementArea::class),
                                ]
                            ],
                            'grant' => RouteConfig::getRouteConfig(
                                'grant',
                                [
                                    'GET' => QueryConfig::getConfig(
                                        Query\Application\Grant::class
                                    ),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\Grant::class
                                    )
                                ]
                            ),
                            'undo-grant' => RouteConfig::getRouteConfig(
                                'undo-grant',
                                [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UndoGrant::class
                                    )
                                ]
                            ),
                            'people' => RouteConfig::getRouteConfig(
                                'people',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Application\People::class),
                                    'POST' => CommandConfig::getPostConfig(Command\Application\CreatePeople::class),
                                    'DELETE' => CommandConfig::getDeleteConfig(Command\Application\DeletePeople::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\RestorePeople::class),
                                    'person' => RouteConfig::getNamedSingleConfig(
                                        'person',
                                        [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Application\UpdatePeople::class
                                            ),
                                        ]
                                    ),
                                    'update-completion' => RouteConfig::getRouteConfig(
                                        'update-completion',
                                        [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Application\UpdateCompletion::class
                                            ),
                                        ]
                                    ),
                                ]
                            ),
                            'update-completion' => RouteConfig::getRouteConfig(
                                'update-completion',
                                [
                                    'POST' => CommandConfig::getPostConfig(Command\Application\UpdateCompletion::class),
                                ]
                            ),
                            'schedule-41' => RouteConfig::getRouteConfig(
                                'schedule-41',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Application\Schedule41::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\Schedule41::class)
                                ]
                            ),
                            'approve-schedule-41' => RouteConfig::getRouteConfig(
                                'approve-schedule-41',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\Schedule41Approve::class)
                                ]
                            ),
                            'reset-schedule-41' => RouteConfig::getRouteConfig(
                                'reset-schedule-41',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\Schedule41Reset::class)
                                ]
                            ),
                            'refuse-schedule-41' => RouteConfig::getRouteConfig(
                                'refuse-schedule-41',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Application\Schedule41Refuse::class)
                                ]
                            ),
                            'generate-organisation-name' => RouteConfig::getRouteConfig(
                                'generate-organisation-name',
                                [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\GenerateOrganisationName::class
                                    ),
                                ]
                            ),
                            'operating-centre' => RouteConfig::getRouteConfig(
                                'operating-centre',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Application\OperatingCentre::class),
                                ]
                            ),
                            'taxi-phv' => RouteConfig::getRouteConfig(
                                'taxi-phv',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Application\TaxiPhv::class),
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Application\DeleteTaxiPhv::class
                                    ),
                                    'POST' => CommandConfig::getPostConfig(Command\Application\CreateTaxiPhv::class),
                                    'single' => RouteConfig::getNamedSingleConfig(
                                        'privateHireLicence',
                                        [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Application\UpdateTaxiPhv::class
                                            ),
                                        ]
                                    ),
                                ]
                            ),
                            'print-interim' => RouteConfig::getRouteConfig(
                                'print-interim',
                                [
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Application\PrintInterimDocument::class
                                    ),
                                ]
                            ),
                            'interim' => RouteConfig::getRouteConfig(
                                'interim',
                                [
                                    'GET' => QueryConfig::getConfig(
                                        Query\Application\Interim::class
                                    ),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateInterim::class
                                    ),
                                    'refuse' => RouteConfig::getRouteConfig(
                                        'refuse',
                                        [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Application\RefuseInterim::class
                                            ),
                                        ]
                                    ),
                                    'grant' => RouteConfig::getRouteConfig(
                                        'grant',
                                        [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Application\GrantInterim::class
                                            ),
                                        ]
                                    ),
                                ]
                            ),
                            'operating-centres' => RouteConfig::getRouteConfig(
                                'operating-centres',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Application\OperatingCentres::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateOperatingCentres::class
                                    ),
                                ]
                            ),
                            'psv-vehicles' => RouteConfig::getRouteConfig(
                                'psv-vehicles',
                                [
                                    'GET' => QueryConfig::getConfig(
                                        Query\Application\PsvVehicles::class
                                    ),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdatePsvVehicles::class
                                    ),
                                ]
                            ),
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\Application\CreateApplication::class),
                    'GET' => QueryConfig::getConfig(Query\Application\GetList::class),
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
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Variation\VoidPsvDiscs::class
                                            ),
                                        ]
                                    ],
                                    'replace' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'replace[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Variation\ReplacePsvDiscs::class
                                            ),
                                        ]
                                    ],
                                    'POST' => CommandConfig::getPostConfig(Command\Variation\CreatePsvDiscs::class),
                                ]
                            ],
                            'operating-centre' => RouteConfig::getRouteConfig(
                                'operating-centre',
                                [
                                    'single' => RouteConfig::getSingleConfig(
                                        [
                                            'DELETE' => CommandConfig::getDeleteConfig(
                                                Command\Variation\DeleteOperatingCentre::class
                                            ),
                                        ]
                                    )
                                ]
                            ),
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
                            'grant' => RouteConfig::getRouteConfig(
                                'grant',
                                [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Variation\Grant::class
                                    )
                                ]
                            ),
                            'condition-undertaking' => RouteConfig::getRouteConfig(
                                'condition-undertaking',
                                [
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Variation\DeleteListConditionUndertaking::class
                                    ),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Variation\RestoreListConditionUndertaking::class
                                    ),
                                    'single' => RouteConfig::getNamedSingleConfig(
                                        'conditionUndertaking',
                                        [
                                            'PUT' => CommandConfig::getPutConfig(
                                                Command\Variation\UpdateConditionUndertaking::class
                                            )
                                        ]
                                    ),
                                ]
                            ),
                            'psv-vehicles' => RouteConfig::getRouteConfig(
                                'psv-vehicles',
                                [
                                    'GET' => QueryConfig::getConfig(
                                        Query\Variation\PsvVehicles::class
                                    ),
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
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'by-number' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'by-number/:licenceNumber'
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Licence\LicenceByNumber::class)
                        ]
                    ],
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
                                            'POST' => CommandConfig::getPostConfig(Command\Licence\VoidPsvDiscs::class),
                                        ]
                                    ],
                                    'replace' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'replace[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'POST' => CommandConfig::getPostConfig(
                                                Command\Licence\ReplacePsvDiscs::class
                                            ),
                                        ]
                                    ],
                                    'POST' => CommandConfig::getPostConfig(Command\Licence\CreatePsvDiscs::class),
                                ]
                            ],
                            'operating-centre' => RouteConfig::getRouteConfig(
                                'operating-centre',
                                [
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Licence\CreateOperatingCentre::class
                                    ),
                                    'DELETE' => CommandConfig::getDeleteConfig(
                                        Command\Licence\DeleteOperatingCentres::class
                                    ),
                                ]
                            ),
                            'psv-vehicles' => RouteConfig::getRouteConfig(
                                'psv-vehicles',
                                [
                                    'POST' => CommandConfig::getPostConfig(
                                        Command\Licence\CreatePsvVehicle::class
                                    ),
                                ]
                            ),
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
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Licence\UpdateVehicles::class
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
                            'enforcement-area' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'enforcement-area[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\EnforcementArea::class),
                                ]
                            ],
                            'condition-undertaking' => RouteConfig::getRouteConfig(
                                'condition-undertaking',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Licence\ConditionUndertaking::class)
                                ]
                            ),
                            'variation' => RouteConfig::getRouteConfig(
                                'variation',
                                [
                                    'POST' => CommandConfig::getPostConfig(Command\Licence\CreateVariation::class),
                                ]
                            ),
                            'people' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'people[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\People::class),
                                    'POST' => CommandConfig::getPostConfig(Command\Licence\CreatePeople::class),
                                    'DELETE' => CommandConfig::getDeleteConfig(Command\Licence\DeletePeople::class),
                                    'person' => RouteConfig::getNamedSingleConfig(
                                        'person',
                                        [
                                            'PUT' => CommandConfig::getPutConfig(Command\Licence\UpdatePeople::class),
                                        ]
                                    )
                                ]
                            ],
                            'operating-centre' => RouteConfig::getRouteConfig(
                                'operating-centre',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Licence\OperatingCentre::class),
                                ]
                            ),
                            'taxi-phv' => RouteConfig::getRouteConfig(
                                'taxi-phv',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Licence\TaxiPhv::class),
                                ]
                            ),
                            'update-traffic-area' => RouteConfig::getRouteConfig(
                                'update-traffic-area',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Licence\UpdateTrafficArea::class),
                                ]
                            ),
                            'markers' => RouteConfig::getRouteConfig(
                                'markers',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Licence\Markers::class),
                                ]
                            ),
                            'continuation-detail' => RouteConfig::getRouteConfig(
                                'continuation-detail',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Licence\ContinuationDetail::class),
                                ]
                            ),
                            'continue-licence' => RouteConfig::getRouteConfig(
                                'continue-licence',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Licence\ContinueLicence::class),
                                ]
                            ),
                            'operating-centres' => RouteConfig::getRouteConfig(
                                'operating-centres',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Licence\OperatingCentres::class),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Licence\UpdateOperatingCentres::class
                                    ),
                                ]
                            ),
                            'psv-vehicles' => RouteConfig::getRouteConfig(
                                'psv-vehicles',
                                [
                                    'GET' => QueryConfig::getConfig(
                                        Query\Licence\PsvVehicles::class
                                    ),
                                ]
                            ),
                            'trailers' => RouteConfig::getRouteConfig(
                                'trailers',
                                [
                                    'GET' => QueryConfig::getConfig(
                                        Query\Licence\Trailers::class
                                    ),
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Licence\UpdateTrailers::class
                                    )
                                ]
                            ),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\Licence\GetList::class),
                ]
            ],
            'previous-conviction' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'previous-conviction[/]',
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
                    'GET' => QueryConfig::getConfig(Query\PreviousConviction\GetList::class),
                ]
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
                    'GET' => QueryConfig::getConfig(Query\OtherLicence\GetList::class),
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
                    'tml' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'tml[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\OtherLicence\CreateForTml::class),
                        ]
                    ],
                    'transport-manager' => RouteConfig::getRouteConfig(
                        'transport-manager',
                        [
                            'POST' => CommandConfig::getPostConfig(Command\OtherLicence\CreateForTm::class),
                        ]
                    ),
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
                            'approve-waive' => RouteConfig::getRouteConfig(
                                'approve-waive',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Fee\ApproveWaive::class),
                                ]
                            ),
                            'recommend-waive' => RouteConfig::getRouteConfig(
                                'recommend-waive',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Fee\RecommendWaive::class),
                                ]
                            ),
                            'reject-waive' => RouteConfig::getRouteConfig(
                                'reject-waive',
                                [
                                    'PUT' => CommandConfig::getPutConfig(Command\Fee\RejectWaive::class),
                                ]
                            ),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\Fee\FeeList::class),
                    'POST' => CommandConfig::getPostConfig(Command\Fee\CreateMiscellaneousFee::class),
                ]
            ],
            'transaction' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'transaction[/]',
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
                            'GET' => QueryConfig::getConfig(Query\Transaction\TransactionByReference::class),
                            'POST' => CommandConfig::getPostConfig(Command\Transaction\CompleteTransaction::class),
                        ],
                    ],
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Transaction\Transaction::class),
                        ]
                    ),
                    'pay-outstanding-fees' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'pay-outstanding-fees[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\Transaction\PayOutstandingFees::class),
                        ],
                    ],
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
                    'GET' => QueryConfig::getConfig(Query\TmEmployment\GetList::class),
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
                            'PUT' => CommandConfig::getPutConfig(Command\ChangeOfEntity\UpdateChangeOfEntity::class),
                            'DELETE' => CommandConfig::getDeleteConfig(
                                Command\ChangeOfEntity\DeleteChangeOfEntity::class
                            )
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\ChangeOfEntity\CreateChangeOfEntity::class),
                ]
            ],
            'correspondence' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'correspondence[/]',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Correspondence\Correspondence::class),
                            'access' => [
                                'type' => 'segment',
                                'options' => [
                                    'route' => 'access[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Correspondence\AccessCorrespondence::class
                                    ),
                                ]
                            ]
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\Correspondence\Correspondences::class),
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
