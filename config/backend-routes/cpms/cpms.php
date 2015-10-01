<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'cpms' => RouteConfig::getRouteConfig(
        'cpms',
        [
            'report' => RouteConfig::getRouteConfig(
                'report',
                [
                    'GET' => QueryConfig::getConfig(Query\Cpms\ReportList::class),
                ]
            )
        ]
    )
];
