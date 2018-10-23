<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'irhp-permit-application' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'irhp-permit-application[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\IrhpPermitApplication\ById::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\IrhpPermitApplication\Delete::class),
                ]
            ),
            'GET' => QueryConfig::getConfig(Query\IrhpPermitApplication\GetList::class)
        ]
    ],
];
