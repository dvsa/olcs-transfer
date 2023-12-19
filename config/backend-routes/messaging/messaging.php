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
            'messages' => RouteConfig::getRouteConfig(
                'messages',
                [
                    'by-conversation' => RouteConfig::getRouteConfig(
                        'by-conversation',
                        [
                            'GET' => QueryConfig::getConfig(Query\Messaging\Messages\ByConversation::class),
                        ],
                    ),
                ]
            ),
            'application-licence-list' => RouteConfig::getRouteConfig(
                'application-licence-list',
                [
//                    'by-licence-to-organisation' => RouteConfig::getRouteConfig(
//                        'by-licence-to-organisation',
//                        [
//                            'GET' => QueryConfig::getConfig(Query\Messaging\ApplicationLicenceList\ByLicenceToOrganisation::class),
//                        ],
//                    ),
//                    'by-application-to-organisation' => RouteConfig::getRouteConfig(
//                        'by-application-to-organisation',
//                        [
//                            'GET' => QueryConfig::getConfig(Query\Messaging\ApplicationLicenceList\ByApplicationToOrganisation::class),
//                        ],
//                    ),
                    'by-organisation' => RouteConfig::getRouteConfig(
                        'by-organisation',
                        [
                            'GET' => QueryConfig::getConfig(Query\Messaging\ApplicationLicenceList\ByOrganisation::class),
                        ],
                    ),
                ]
            )
        ]
    )
];
