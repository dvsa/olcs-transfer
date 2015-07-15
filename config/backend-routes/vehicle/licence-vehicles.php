<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'licence-vehicle' => RouteConfig::getRouteConfig(
        'licence-vehicle',
        [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\LicenceVehicle\LicenceVehicle::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Vehicle\UpdateGoodsVehicle::class),
                ]
            ),
            'DELETE' => CommandConfig::getDeleteConfig(Command\Vehicle\DeleteGoodsVehicle::class)
        ]
    )
];
