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
                    'route' => 'cases[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Cases\Cases::class),
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
                    )
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
                            'workshop' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'workshop[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
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
                            'outstanding-fees' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'outstanding-fees[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => QueryConfig::getConfig(Query\Organisation\OutstandingFees::class),
                                ],
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
            'workshop' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'workshop[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'DELETE' => CommandConfig::getDeleteConfig(Command\Workshop\DeleteWorkshop::class),
                    'POST' => CommandConfig::getPostConfig(Command\Workshop\CreateWorkshop::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Workshop\Workshop::class),
                            'PUT' => CommandConfig::getPutConfig(Command\Workshop\UpdateWorkshop::class),
                        ]
                    ),
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
            'conviction' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'conviction[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET'    => QueryConfig::getConfig(Query\Cases\Conviction\ConvictionList::class),
                    'POST'   => CommandConfig::getPostConfig(Command\Cases\Conviction\Create::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET'    => QueryConfig::getConfig(Query\Cases\Conviction\Conviction::class),
                            'PUT'    => CommandConfig::getPutConfig(Command\Cases\Conviction\Update::class),
                            'DELETE' => CommandConfig::getDeleteConfig(Command\Cases\Conviction\Delete::class),
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
                    'GET'    => QueryConfig::getConfig(Query\Cases\Prohibition\ProhibitionList::class),
                    'POST'   => CommandConfig::getPostConfig(Command\Cases\Prohibition\Create::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET'    => QueryConfig::getConfig(Query\Cases\Prohibition\Prohibition::class),
                            'PUT'    => CommandConfig::getPutConfig(Command\Cases\Prohibition\Update::class),
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
                    'GET'    => QueryConfig::getConfig(Query\Cases\Prohibition\DefectList::class),
                    'POST'   => CommandConfig::getPostConfig(Command\Cases\Prohibition\Defect\Create::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET'    => QueryConfig::getConfig(Query\Cases\Prohibition\Defect::class),
                            'PUT'    => CommandConfig::getPutConfig(Command\Cases\Prohibition\Defect\Update::class),
                            'DELETE' => CommandConfig::getDeleteConfig(Command\Cases\Prohibition\Defect\Delete::class),
                        ]
                    )
                ]
            ],
            'non-pi' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'non-pi[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET'    => QueryConfig::getConfig(Query\Cases\NonPi\Listing::class),
                    'POST'   => CommandConfig::getPostConfig(Command\Cases\NonPi\Create::class),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET'    => QueryConfig::getConfig(Query\Cases\NonPi\Single::class),
                            'PUT'    => CommandConfig::getPutConfig(Command\Cases\NonPi\Update::class),
                            'DELETE' => CommandConfig::getDeleteConfig(Command\Cases\NonPi\Delete::class),
                        ]
                    )
                ]
            ],
            'environmental-complaint' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'cases/:case/environmental-complaint[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(
                        Query\Cases\EnvironmentalComplaint\EnvironmentalComplaintList::class
                    ),
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(
                                Query\Cases\EnvironmentalComplaint\EnvironmentalComplaint::class
                            ),
                            'PUT' => CommandConfig::getPutConfig(
                                Command\Cases\EnvironmentalComplaint\UpdateEnvironmentalComplaint::class
                            ),
                            'DELETE' => CommandConfig::getDeleteConfig(
                                Command\Cases\EnvironmentalComplaint\DeleteEnvironmentalComplaint::class
                            )
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(
                        Command\Cases\EnvironmentalComplaint\CreateEnvironmentalComplaint::class
                    )
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
                ],
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
                             'POST' =>CommandConfig::getPostConfig(Command\Payment\PayOutstandingFees::class),
                        ],
                    ],
                ]
            ],
            'document' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'document[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'template' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'template[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'single' => RouteConfig::getSingleConfig(
                                [
                                    'paragraphs' => [
                                        'type' => 'Segment',
                                        'options' => [
                                            'route' => 'paragraphs[/]',
                                        ],
                                        'may_terminate' => false,
                                        'child_routes' => [
                                            'GET' => QueryConfig::getConfig(Query\Document\TemplateParagraphs::class),
                                        ]
                                    ]
                                ]
                            )
                        ]
                    ],
                    'letter' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'letter[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\Document\CreateLetter::class),
                        ]
                    ],
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'DELETE' => CommandConfig::getDeleteConfig(Command\Document\DeleteDocument::class),
                        ]
                    ),
                    'POST' => CommandConfig::getPostConfig(Command\Document\CreateDocument::class),
                ]
            ],
            'scan' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'scan[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'separator-sheet' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'separator-sheet[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(Command\Scan\CreateSeparatorSheet::class),
                        ],
                    ],
                    'continuation-separator-sheet' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => 'continuation-separator-sheet[/]',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'POST' => CommandConfig::getPostConfig(
                                Command\Scan\CreateContinuationSeparatorSheet::class
                            ),
                        ],
                    ],
                ]
            ],
        ]
    ]
];
