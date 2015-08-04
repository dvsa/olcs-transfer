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
            'POST' => CommandConfig::getPostConfig(Command\Submission\CreateSubmission::class),
        ]
    ]
];
