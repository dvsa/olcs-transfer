<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;

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
                            'GET' => [
                                'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
                                'options' => [
                                    'defaults' => [
                                        'dto' => \Dvsa\Olcs\Transfer\Query\Cases\Pi::class
                                    ]
                                ]
                            ],
                            'agreed' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'agreed[/]'
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => [
                                        'type' => \Zend\Mvc\Router\Http\Method::class,
                                        'options' => [
                                            'verb' => 'PUT',
                                            'defaults' => [
                                                'dto' =>
                                                    Command\Cases\UpdatePiAgreedAndLegislation::class
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
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
                    'single' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => ':id[/]',
                            'constraints' => [
                                //'id' => '[0-9]+'// Removing this allows us to consistently validate the id
                            ],
                            'defaults' => [
                                'id' => null,
                            ]
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => [
                                'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
                                'options' => [
                                    'defaults' => [
                                        'dto' => Query\Application\Application::class
                                    ]
                                ]
                            ],
                            'type-of-licence' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'type-of-licence[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => [
                                        'type' => \Zend\Mvc\Router\Http\Method::class,
                                        'options' => [
                                            'verb' => 'PUT',
                                            'defaults' => [
                                                'dto' =>
                                                    Command\Application\UpdateTypeOfLicence::class
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'POST' => [
                        'type' => \Zend\Mvc\Router\Http\Method::class,
                        'options' => [
                            'verb' => 'POST',
                            'defaults' => [
                                'dto' => Command\Application\CreateApplication::class
                            ]
                        ]
                    ]
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
                    'single' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => ':id[/]',
                            'defaults' => [
                                'id' => null,
                                'controller' => 'Api\Generic'
                            ]
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => [
                                'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
                                'options' => [
                                    'defaults' => [
                                        'dto' => Query\Bus\BusReg::class
                                    ]
                                ]
                            ],
                        ]
                    ]
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
                    'single' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => ':id[/]',
                            'constraints' => [],
                            'defaults' => [
                                'id' => null,
                            ]
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => [
                                'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
                                'options' => [
                                    'defaults' => [
                                        'dto' => Query\Organisation\Organisation::class
                                    ]
                                ]
                            ],
                            'business-type' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'business-type[/]',
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => [
                                        'type' => \Zend\Mvc\Router\Http\Method::class,
                                        'options' => [
                                            'verb' => 'PUT',
                                            'defaults' => [
                                                'dto' =>
                                                    Command\Organisation\UpdateBusinessType::class
                                            ]
                                        ]
                                    ]
                                ]
                            ]
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
                        'type' => 'literal',
                        'options' => [
                            'route' => 'history',
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => [
                                'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
                                'options' => [
                                    'defaults' => [
                                        'dto' => \Dvsa\Olcs\Transfer\Query\Processing\History::class
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
