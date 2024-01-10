<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'licence-application' => RouteConfig::getRouteConfig(
        'licence-application',
        [
            'by-organisation' => RouteConfig::getRouteConfig(
                'by-organisation',
                [
                    'GET' => QueryConfig::getConfig(Query\Licence\ByOrganisation::class),
                ],
            ),
        ]
    ),
];
