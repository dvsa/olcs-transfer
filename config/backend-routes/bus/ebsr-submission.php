<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'ebsr-submission' => RouteConfig::getRouteConfig(
        'ebsr-submission',
        [
            'GET' => QueryConfig::getConfig(Query\Bus\EbsrSubmissionList::class),
            'single' => RouteConfig::getSingleConfig(
                [
                    'PUT' => CommandConfig::getPutConfig(Command\Bus\EbsrSubmissionUpdate::class),
                ]
            ),
        ]
    )
];
