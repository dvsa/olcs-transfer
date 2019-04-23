<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'template' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'template[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'available-templates' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'available-templates[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Template\AvailableTemplates::class),
                ]
            ],
            'preview-template-source' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'preview-template-source[/]'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Template\PreviewTemplateSource::class)
                ]
            ],
            'template-source' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'template-source[/]'
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Template\TemplateSource::class)
                ]
            ],
            'update-template-source' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'update-template-source[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\Template\UpdateTemplateSource::class),
                ]
            ],
        ]
    ]
];
