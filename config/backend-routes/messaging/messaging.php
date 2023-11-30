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
                    'GET' => QueryConfig::getConfig(Query\Messaging\GetConversationList::class),
                ]
            ),
            'messages' => RouteConfig::getRouteConfig(
                'messages',
                [
                    'GET' => QueryConfig::getConfig(Query\Messaging\GetConversationMessages::class),
                ]
            ),
        ]
    )
];
