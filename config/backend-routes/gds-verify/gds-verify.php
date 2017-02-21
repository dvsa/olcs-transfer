<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'gds-verify' => RouteConfig::getRouteConfig(
        'gds-verify',
        [
            'auth-request' => RouteConfig::getRouteConfig(
                'auth-request',
                [
                    'GET' => QueryConfig::getConfig(Query\GdsVerify\GetAuthRequest::class),
                ]
            ),
            'process-response' => RouteConfig::getRouteConfig(
                'process-response',
                [
                    'POST' => CommandConfig::getPostConfig(Command\GdsVerify\ProcessSignatureResponse::class),
                ]
            ),
        ]
    )
];
