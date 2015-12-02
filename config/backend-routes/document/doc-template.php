<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'doc-template' => RouteConfig::getRouteConfig(
        'doc-template',
        [
            'GET' => QueryConfig::getConfig(Query\DocTemplate\GetList::class),
        ]
    )
];
