<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'messaging' => RouteConfig::getRouteConfig(
        'messaging',
        [
            'conversations' => RouteConfig::getRouteConfig(
                'conversations',
                [
                    'by-licence' => RouteConfig::getRouteConfig(
                        'by-licence',
                        [
                            'GET' => QueryConfig::getConfig(Query\Messaging\Conversations\ByLicence::class),
                        ],
                    ),
                    'by-application-to-licence' => RouteConfig::getRouteConfig(
                        'by-application-to-licence',
                        [
                            'GET' => QueryConfig::getConfig(Query\Messaging\Conversations\ByApplicationToLicence::class),
                        ],
                    ),
                ],
            ),
        ]
    )
];
