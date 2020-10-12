<?php

use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\QueryConfig;

return [
    'translation-cache-key' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'translation-cache-key[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\TranslationCache\Key::class),
        ],
    ],
];
