<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'contact-details' => RouteConfig::getRouteConfig(
        'contact-details',
        [
            'GET' => QueryConfig::getConfig(Query\ContactDetail\ContactDetailsList::class),
        ]
    )
];
