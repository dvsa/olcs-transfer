<?php

return [
    'api_router' => [
        'routes' => [
            'api' => [
                'type' => 'Scheme',
                'options' => [
                    'scheme' => 'http'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'backend' => [
                        'type' => 'Hostname',
                        'options' => [
                            'route' => 'olcs-backend'
                        ],
                        'may_terminate' => false,
                        'child_routes' => [
                            'application' => [
                                'type' => 'Segment',
                                'options' => [
                                    'route' => '/application/:id[/]',
                                    'constraints' => [
                                        //'id' => '[0-9]+'// Removing this allows us to consistently validate the id
                                    ],
                                    'default' => [
                                        'controller' => 'Application'
                                    ]
                                ],
                                'may_terminate' => false,
                                'child_routes' => [
                                    'GET' => [
                                        'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
                                        'options' => [
                                            'default' => [
                                                'dto' => \Dvsa\Olcs\Transfer\Query\Application\TypeOfLicence::class
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'service_manager' => [
        'factories' => [
            'ApiRouter' => \Dvsa\Olcs\Transfer\Router\RouterFactory::class,
        ],
        'invokables' => [
            'TransferAnnotationBuilder' => \Dvsa\Olcs\Transfer\Util\Annotation\AnnotationBuilder::class,
        ]
    ]
];
