<?php return [
    'surrender' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'surrender[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [

            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\LicenceStatusRule\LicenceStatusRule::class),

                ]
            ),
        ]
    ]
];