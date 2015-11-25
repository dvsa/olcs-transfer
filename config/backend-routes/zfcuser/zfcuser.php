<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

/**
 * @todo Remove this when we are fully integrated with OpenAM
 */
return [
    'zfcuser' => RouteConfig::getRouteConfig(
        'zfcuser',
        [
            'GET' => QueryConfig::getConfig(Query\User\ZfcUser::class),
        ]
    )
];
