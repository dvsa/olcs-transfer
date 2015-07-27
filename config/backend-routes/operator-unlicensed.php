<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;

return [
    'operator-unlicensed' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'operator-unlicensed[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'POST' => CommandConfig::getPostConfig(Command\Operator\CreateUnlicensed::class)
        ]
    ]
];
