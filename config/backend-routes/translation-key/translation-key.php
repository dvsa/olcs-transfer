<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'translation-key' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'translation-key[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\TranslationKey\ById::class)
                ]
            ),
            'GET' => QueryConfig::getConfig(Query\TranslationKey\GetList::class),
        ]
    ],
];
