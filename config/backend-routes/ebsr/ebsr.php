<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'ebsr' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'ebsr[/]',
            'defaults' => [
                'id' => null
            ]
        ],
        'may_terminate' => false,
        'child_routes' => [
            'POST' => CommandConfig::getPostConfig(Command\Ebsr\Upload::class),
            'submission-list' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'submission-list[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\Ebsr\SubmissionList::class),
                ]
            ]
        ]
    ]
];
