<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'search' => RouteConfig::getRouteConfig(
        'search',
        [
            'licence' => RouteConfig::getRouteConfig(
                'licence',
                [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\Search\Licence::class),
                        ]
                    ),
                ]
            )
        ]
    )
];
