<?php

namespace Dvsa\Olcs\Transfer\Router;

/**
 * Route Config
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class RouteConfig
{
    public static function getSingleConfig($childRoutes = null)
    {
        $config = [
            'type' => 'Segment',
            'options' => [
                'route' => ':id[/]',
                'defaults' => [
                    'id' => null
                ]
            ]
        ];

        if ($childRoutes !== null) {
            $config['may_terminate'] = false;
            $config['child_routes'] = $childRoutes;
        }

        return $config;
    }
}
