<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'submission' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'submission[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\Submission\SubmissionList::class),
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Submission\Submission::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Submission\UpdateSubmission::class),
                    'DELETE' => CommandConfig::getDeleteConfig(
                        Command\Submission\DeleteSubmission::class
                    )
                ]
            ),
            'refresh' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'refresh[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\Submission\RefreshSubmissionSections::class),
                ]
            ],
            'filter' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'filter[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\Submission\FilterSubmissionSections::class),
                ]
            ],
            'assign' => [
                'type' => 'Segment',
                'options' => [
                    'route' => 'assign[/]',
                ],
                'may_terminate' => false,
                'child_routes' => [
                    'PUT' => CommandConfig::getPutConfig(Command\Submission\AssignSubmission::class),
                ]
            ],
            'POST' => CommandConfig::getPostConfig(Command\Submission\CreateSubmission::class),
        ]
    ]
];
