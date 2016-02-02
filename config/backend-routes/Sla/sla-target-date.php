<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'sla-target-date' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'sla-target-date[/]',
        ],
        'may_terminate' => false,
        'child_routes' =>
            [
                'GET' => QueryConfig::getConfig(Query\Sla\SlaTargetDate::class),
                'PUT' => CommandConfig::getPutConfig(
                    Command\Sla\UpdateSlaTargetDate::class
                ),
            'POST' => CommandConfig::getPostConfig(
                Command\Sla\CreateSlaTargetDate::class
            )
        ]
    ]
];
