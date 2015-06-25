<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'complaint' => [
        'type' => 'Segment',
        'options' => [
            'route' => 'complaint[/]',
        ],
        'may_terminate' => false,
        'child_routes' => [
            'GET' => QueryConfig::getConfig(Query\Cases\Complaint\ComplaintList::class),
            'single' => RouteConfig::getSingleConfig(
                [
                    'GET' => QueryConfig::getConfig(Query\Cases\Complaint\Complaint::class),
                    'PUT' => CommandConfig::getPutConfig(Command\Cases\Complaint\UpdateComplaint::class),
                    'DELETE' => CommandConfig::getDeleteConfig(
                        Command\Cases\Complaint\DeleteComplaint::class
                    )
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\Cases\Complaint\CreateComplaint::class)
        ]
    ]
];
