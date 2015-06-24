<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;

return [
    'conviction' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'operator[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'create' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'create[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\Operator\Create::class)
                ]
            ],
        ]
    ]
];
