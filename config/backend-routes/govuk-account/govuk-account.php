<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Router\CommandConfig;

return [
    'govuk-account' =>  [
        'type' => 'Segment',
        'options' => [
            'route' => 'govuk-account[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'get-govuk-account-redirect' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'get-govuk-account-redirect[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'POST' => CommandConfig::getPostConfig(Command\GovUkAccount\GetGovUkAccountRedirect::class),
                ]
            ],
        ]
    ],
];
