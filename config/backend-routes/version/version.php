<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'version' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'version[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\Version\Version::class)
        ]
    ]
];