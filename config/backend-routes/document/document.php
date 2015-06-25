<?php

use Dvsa\Olcs\Transfer\Command;
use Dvsa\Olcs\Transfer\Query;
use Dvsa\Olcs\Transfer\Router\CommandConfig;
use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Dvsa\Olcs\Transfer\Router\RouteConfig;

return [
    'document' => RouteConfig::getRouteConfig(
        'document',
        [
            'template' => RouteConfig::getRouteConfig(
                'template',
                [
                    'single' => RouteConfig::getSingleConfig(
                        [
                            'paragraphs' => RouteConfig::getRouteConfig(
                                'paragraphs',
                                [
                                    'GET' => QueryConfig::getConfig(Query\Document\TemplateParagraphs::class),
                                ]
                            )
                        ]
                    )
                ]
            ),
            'letter' => RouteConfig::getRouteConfig(
                'letter',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Document\CreateLetter::class),
                ]
            ),
            'single' => RouteConfig::getSingleConfig(
                [
                    'DELETE' => CommandConfig::getDeleteConfig(Command\Document\DeleteDocument::class),
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\Document\CreateDocument::class),
        ]
    )
];
