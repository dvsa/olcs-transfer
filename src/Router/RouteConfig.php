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
        return self::getSingleConfigByName('id', $childRoutes);
    }

    public static function getNamedSingleConfig($name, $childRoutes = null)
    {
        return self::getSingleConfigByName($name, $childRoutes);
    }

    private static function getSingleConfigByName($name, $childRoutes = null)
    {
        $config = [
            'type' => 'Segment',
            'options' => [
                'route' => ':' . $name . '[/]',
                'defaults' => [
                    $name => null
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
