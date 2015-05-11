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
                        'child_routes' => include('backend-routes.config.php')
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
