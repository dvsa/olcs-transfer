<?php

namespace Dvsa\Olcs\Transfer\Router;

/**
 * Query Config
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class QueryConfig
{
    public static function getConfig($dto)
    {
        return [
            'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
            'options' => [
                'defaults' => [
                    'dto' => $dto
                ]
            ]
        ];
    }
}
