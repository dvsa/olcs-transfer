<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'audit' => RouteConfig::getRouteConfig(
        'audit',
        [
            'read' => RouteConfig::getRouteConfig(
                'read',
                [
                    'application' => RouteConfig::getRouteConfig(
                        'application',
                        [
                            'POST' => CommandConfig::getPostConfig(Command\Audit\ReadApplication::class)
                        ]
                    ),
                    'licence' => RouteConfig::getRouteConfig(
                        'licence',
                        [
                            'POST' => CommandConfig::getPostConfig(Command\Audit\ReadLicence::class)
                        ]
                    ),
                    'organisation' => RouteConfig::getRouteConfig(
                        'organisation',
                        [
                            'POST' => CommandConfig::getPostConfig(Command\Audit\ReadOrganisation::class)
                        ]
                    ),
                    'bus-reg' => RouteConfig::getRouteConfig(
                        'bus-reg',
                        [
                            'POST' => CommandConfig::getPostConfig(Command\Audit\ReadBusReg::class)
                        ]
                    ),
                    'transport-manager' => RouteConfig::getRouteConfig(
                        'transport-manager',
                        [
                            'POST' => CommandConfig::getPostConfig(Command\Audit\ReadTransportManager::class)
                        ]
                    ),
                    'case' => RouteConfig::getRouteConfig(
                        'case',
                        [
                            'POST' => CommandConfig::getPostConfig(Command\Audit\ReadCase::class)
                        ]
                    ),
                ]
            )
        ]
    )
];
