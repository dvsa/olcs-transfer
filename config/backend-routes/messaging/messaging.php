<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'messaging' => RouteConfig::getRouteConfig(
        'messaging',
        [
            'messages' => RouteConfig::getRouteConfig(
                'messages',
                [
                    'GET' => QueryConfig::getConfig(Query\Messaging\GetConversationMessages::class),
                ]
            ),
        ]
    )
];