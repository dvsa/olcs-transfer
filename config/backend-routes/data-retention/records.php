<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'data-retention-records' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'data-retention/records',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\DataRetention\Records::class),
        ]
    ],
];
