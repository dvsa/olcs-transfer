<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'irhp-permits' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'irhp-permits[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\IrhpPermit\GetList::class),
        ]
    ],
];
