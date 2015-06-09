<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
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
            'cases' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'cases/:id[/]',
                    'defaults' => [
                        'controller' => 'Api\Cases'
                    ],
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => [
                        'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
                        'options' => [
                            'defaults' => [
                                //'dto' => \Dvsa\Olcs\src\Query\Cases\Cases::class
                            ]
                        ]
                    ],
                    'pi' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'pi[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => QueryConfig::getConfig(Query\Cases\Pi::class),
                            'agreed' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'agreed[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Cases\UpdatePiAgreedAndLegislation::class
                                    ),
                                ]
                            ]
                        ]
                    ]
                ]
            ],
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
                            ],
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
                            ]
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
                        ]
                    ),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Licence\Licence::class),
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
                            ]
                        ]
                    ),
                ]
            ],
            'bus' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'bus[/]',
                    'defaults' => [
                        'id' => null,
                        'controller' => 'Api\Generic'
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
                        ]
                    ),
                ]
            ],
            'organisation' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'organisation[/]',
                    'defaults' => [
                        'id' => null,
                    ]
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Organisation\Organisation::class),
                            'business-type' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'business-type[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Organisation\UpdateBusinessType::class
                                    ),
                                ]
                            ],
                            'business-details' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'business-details[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Organisation\BusinessDetails::class),
                                ]
                            ],
                        ]
                    ),
                    'business-details' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'business-details[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'licence' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'licence/:id[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Licence\BusinessDetails::class),
                                    'PUT' => CommandConfig::getPutConfig(Command\Licence\UpdateBusinessDetails::class),
                                ]
                            ],
                            'application' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'application/:id[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => CommandConfig::getPutConfig(
                                        Command\Application\UpdateBusinessDetails::class
                                    ),
                                ]
                            ]
                        ]
                    ],
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
                    )
                ]
            ],
            'irfo' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'irfo[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
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
                    ]
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
                            'GET'    => QueryConfig::getConfig(Query\Processing\NoteList::class),
                            'POST'   => CommandConfig::getPostConfig(Command\Processing\Note\Create::class),
                            'single' => RouteConfig::getSingleConfig(
                                [
                                    'GET'    => QueryConfig::getConfig(Query\Processing\Note::class),
                                    'PUT'    => CommandConfig::getPutConfig(Command\Processing\Note\Update::class),
                                    'DELETE' => CommandConfig::getDeleteConfig(Command\Processing\Note\Delete::class),
                                ]
                            )
                        ]
                    ]
                ]
            ],
            'company-subsidiary' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'company-subsidiary[/]',
                    'defaults' => [
                        'id' => null,
                    ]
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\CompanySubsidiary\CompanySubsidiary::class),
                        ]
                    )
                ]
            ],
            'trailers' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'trailers[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Trailer\Trailer::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Trailer\UpdateTrailer::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\Trailer\Trailers::class),
                    'POST' => CommandConfig::getPostConfig(Command\Trailer\CreateTrailer::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\Trailer\DeleteTrailer::class),
                ]
            ],
            'grace-periods' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'grace-periods[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\GracePeriod\GracePeriod::class),
                            'PUT' => CommandConfig::getPutConfig(Command\GracePeriod\UpdateGracePeriod::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\GracePeriod\GracePeriods::class),
                    'POST' => CommandConfig::getPostConfig(Command\GracePeriod\CreateGracePeriod::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\GracePeriod\DeleteGracePeriod::class),
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
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\OtherLicence\CreateOtherLicence::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\OtherLicence\DeleteOtherLicence::class),
                ]
            ],
            'impoundings' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'cases/:case/impoundings[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Cases\ImpoundingList::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Cases\Impounding::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Cases\Impounding\UpdateImpounding::class),
                            'DELETE' => CommandConfig::getDeleteConfig(
                                Command\Cases\Impounding\DeleteImpounding::class
                            )
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\Cases\Impounding\CreateImpounding::class),
                ]
            ],
            'complaint' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'cases/:case/complaint[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Cases\Complaint\ComplaintList::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Cases\Complaint\Complaint::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Cases\Complaint\UpdateComplaint::class),
                            'DELETE' => CommandConfig::getDeleteConfig(
                                Command\Cases\Complaint\DeleteComplaint::class
                            )
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\Cases\Complaint\CreateComplaint::class)
                ]
            ],
            'grace-periods' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'grace-periods[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\GracePeriod\GracePeriod::class),
                            'PUT' => CommandConfig::getPutConfig(Command\GracePeriod\UpdateGracePeriod::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\GracePeriod\GracePeriods::class),
                    'POST' => CommandConfig::getPostConfig(Command\GracePeriod\CreateGracePeriod::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\GracePeriod\DeleteGracePeriod::class),
                ]
            ]
        ]
    ]
];
