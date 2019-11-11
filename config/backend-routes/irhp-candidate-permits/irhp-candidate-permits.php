<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'irhp-candidate-permits' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'irhp-candidate-permits[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\IrhpCandidatePermit\GetList::class),
            'by-irhp-application' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'by-irhp-application[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'GET' => QueryConfig::getConfig(Query\IrhpCandidatePermit\GetListByIrhpApplication::class),
                ]
            ],
        ]
    ],
];
