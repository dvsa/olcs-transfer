<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'my-account' => [
        'type' => 'segment',
        'options' => [
            'route' => 'my-account[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'PUT' => CommandConfig::getPutConfig(Command\MyAccount\UpdateMyAccount::class),
                ]
            ),
            'GET' => QueryConfig::getConfig(Query\MyAccount\MyAccount::class),
        ],
    ]
];
