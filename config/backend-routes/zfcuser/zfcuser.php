<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'zfcuser' => RouteConfig::getRouteConfig(
        'zfcuser',
        [
            'GET' => QueryConfig::getConfig(Query\User\ZfcUser::class),
        ]
    )
];
