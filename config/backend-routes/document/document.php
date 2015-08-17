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
                    'GET' => QueryConfig::getConfig(Query\Document\Document::class),
                    'DELETE' => CommandConfig::getDeleteConfig(Command\Document\DeleteDocument::class),
                    'letter' => RouteConfig::getRouteConfig(
                        'letter',
                        [
                            'GET' => QueryConfig::getConfig(Query\Document\Letter::class),
                        ]
                    ),
                    'links' => RouteConfig::getRouteConfig(
                        'links',
                        [
                            'PUT' => CommandConfig::getPutConfig(Command\Document\UpdateDocumentLinks::class),
                        ]
                    ),
                ]
            ),
            'POST' => CommandConfig::getPostConfig(Command\Document\CreateDocument::class),
            'DELETE' => CommandConfig::getDeleteConfig(Command\Document\DeleteDocuments::class),
            'GET' => QueryConfig::getConfig(Query\Document\DocumentList::class),
            'copy' => RouteConfig::getRouteConfig(
                'copy',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Document\CopyDocument::class),
                ]
            ),
            'move' => RouteConfig::getRouteConfig(
                'move',
                [
                    'POST' => CommandConfig::getPostConfig(Command\Document\MoveDocument::class),
                ]
            ),
        ]
    )
];
