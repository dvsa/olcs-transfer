<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'data-retention' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'data-retention[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\DataRetention\RuleList::class),
        ]
    ],
];
