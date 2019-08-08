<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'companies-house' => RouteConfig::getRouteConfig(
        'companies-house',
        [
            'GET' => QueryConfig::getConfig(Query\CompaniesHouse\GetList::class),
            'insolvency-practitioner' => RouteConfig::getRouteConfig(
                'insolvency-practitioner',
                [
                    'GET' => QueryConfig::getConfig(Query\CompaniesHouse\InsolvencyPractitioner::class)
                ]
            )
        ]
    ),
];
