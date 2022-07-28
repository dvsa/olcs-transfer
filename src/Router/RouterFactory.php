<?php

/**
 * Custom Router Factory for api routing
 */
namespace Dvsa\Olcs\Transfer\Router;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

/**
 * Custom Router Factory for api routing
 */
class RouterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->has('Config') ? $container->get('Config') : [];

        // Defaults
        $routerClass = 'Laminas\Mvc\Router\Http\TreeRouteStack';
        $routerConfig = isset($config['api_router']) ? $config['api_router'] : [];

        // Obtain the configured router class, if any
        if (isset($routerConfig['router_class']) && class_exists($routerConfig['router_class'])) {
            $routerClass = $routerConfig['router_class'];
        }

        // Inject the route plugins
        if (!isset($routerConfig['route_plugins'])) {
            $routePluginManager = $container->get('RoutePluginManager');
            $routerConfig['route_plugins'] = $routePluginManager;
        }

        // Obtain an instance
        $factory = sprintf('%s::factory', $routerClass);
        return call_user_func($factory, $routerConfig);
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @param $cName
     * @param $rName
     * @return mixed
     * @deprecated Not needed after Laminas 3
     */
    public function createService(ServiceLocatorInterface $serviceLocator, $cName = null, $rName = null)
    {
        return $this($serviceLocator, null);
    }
}
