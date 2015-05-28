<?php

return [
    'api' => [
        'type' => 'Literal',
        'options' => [
            'route' => '/api/',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'cases' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'cases/:id[/]',
                    'defaults' => [
                        'controller' => 'Api\Cases'
                    ]
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
                                                'dto' => \Dvsa\Olcs\Transfer\Command\Cases\UpdatePiAgreedAndLegislation::class
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
                        'controller' => 'Api\Application'
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
                                'controller' => 'Api\Application'
                            ]
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'GET' => [
                                'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
                                'options' => [
                                    'defaults' => [
                                        'dto' => \Dvsa\Olcs\Transfer\Query\Application\Application::class
                                    ]
                                ]
                            ],
                            'type-of-licence' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => 'type-of-licence[/]',
                                    'defaults' => [
                                        'controller' => 'Api\Application\TypeOfLicence'
                                    ]
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'PUT' => [
                                        'type' => \Zend\Mvc\Router\Http\Method::class,
                                        'options' => [
                                            'verb' => 'PUT',
                                            'defaults' => [
                                                'dto' => \Dvsa\Olcs\Transfer\Command\Application\UpdateTypeOfLicence::class
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
                                'dto' => \Dvsa\Olcs\Transfer\Command\Application\CreateApplication::class
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
                            'defaults' => [
                                'controller' => 'Api\Generic'
                            ]
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
