<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'user' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'user[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'internal' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'internal[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\User\User::class),
                            'PUT' => CommandConfig::getPutConfig(Command\User\UpdateUser::class),
                            'DELETE' => CommandConfig::getDeleteConfig(Command\User\DeleteUser::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\User\UserList::class),
                    'POST' => CommandConfig::getPostConfig(Command\User\CreateUser::class),
                ]
            ],
            'selfserve' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'selfserve[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'GET' => QueryConfig::getConfig(Query\User\UserSelfserve::class),
                            'PUT' => CommandConfig::getPutConfig(Command\User\UpdateUserSelfserve::class),
                            'DELETE' => CommandConfig::getDeleteConfig(Command\User\DeleteUserSelfserve::class),
                        ]
                    ),
                    'GET' => QueryConfig::getConfig(Query\User\UserListSelfserve::class),
                    'POST' => CommandConfig::getPostConfig(Command\User\CreateUserSelfserve::class),
                ]
            ],
        ]
    ],
];
