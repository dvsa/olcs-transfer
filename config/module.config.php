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
                        'type' => \Dvsa\Olcs\Transfer\Util\Hostname::class,
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
            'TransferAnnotationBuilder' => \Dvsa\Olcs\Transfer\Util\Annotation\AnnotationBuilderFactory::class
        ]
    ],
    'filters' => [
        'invokables' => [
            \Dvsa\Olcs\Transfer\Filter\Vrm::class => \Dvsa\Olcs\Transfer\Filter\Vrm::class
        ],
    ],
    'validators' => [
        'invokables' => [
            \Dvsa\Olcs\Transfer\Validators\Vrm::class => \Dvsa\Olcs\Transfer\Validators\Vrm::class
        ],
        'factories' => [
            \Dvsa\Olcs\Transfer\Validators\Xml::class => \Dvsa\Olcs\Transfer\Validators\XmlFactory::class
        ],
    ],
];
