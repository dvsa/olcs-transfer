<?php

return [
    'api' => [
        'type' => 'Literal',
        'options' => [
            'route' => '/api/',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'application/:id[/]',
                    'constraints' => [
                        //'id' => '[0-9]+'// Removing this allows us to consistently validate the id
                    ],
                    'defaults' => [
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
                    ]
                ]
            ]
        ]
    ]
];
