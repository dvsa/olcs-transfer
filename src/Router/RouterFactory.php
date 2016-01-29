<?php

/**
 * Custom Router Factory for api routing
 */
namespace Dvsa\Olcs\Transfer\Router;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Custom Router Factory for api routing
 */
class RouterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator, $cName = null, $rName = null)
    {
        $config = $serviceLocator->has('Config') ? $serviceLocator->get('Config') : [];

        // Defaults
        $routerClass = 'Zend\Mvc\Router\Http\TreeRouteStack';
        $routerConfig = isset($config['api_router']) ? $config['api_router'] : [];

        // Obtain the configured router class, if any
        if (isset($routerConfig['router_class']) && class_exists($routerConfig['router_class'])) {
            $routerClass = $routerConfig['router_class'];
        }

        // Inject the route plugins
        if (!isset($routerConfig['route_plugins'])) {
            $routePluginManager = $serviceLocator->get('RoutePluginManager');
            $routerConfig['route_plugins'] = $routePluginManager;
        }

        // Obtain an instance
        $factory = sprintf('%s::factory', $routerClass);
        return call_user_func($factory, $routerConfig);
    }
}
