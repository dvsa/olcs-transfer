<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'organisation-person' => RouteConfig::getRouteConfig(
        'organisation-person',
        [
            'populate-from-companies-house' => RouteConfig::getRouteConfig(
                'populate-from-companies-house',
                [
                    'POST' => CommandConfig::getPostConfig(
                        Command\OrganisationPerson\PopulateFromCompaniesHouse::class
                    ),
                ]
            )
        ]
    )
];
