<?php

namespace Dvsa\Olcs\Transfer\Util;


class ChildRoutesGenerator
{

    private $routes;

    private $directory;

    /**
     * ChildRoutesGenerator constructor.
     */
    public function __construct(array $routes, string $directory)
    {
        $this->routes = $routes;
        $this->directory = $directory;
    }

    private function buildChildRoutes($directory, $child = [])
    {
        $paths = scandir($directory);

        foreach ($paths as $path) {

            if(substr($path, 0, 1) === '.') {
                continue;
            }

            if(!is_dir($path) && pathinfo($path, PATHINFO_EXTENSION) === 'php') {
                $childRoot = include $directory . '/' . $path;
                $child[key($childRoot)] = current($childRoot);
            } else {
                $child[$path] = [
                    'child_routes' => []
                ];
                $child[$path]['child_routes'] = $this->buildChildRoutes($directory . '/' . $path, $child[$path]['child_routes']);
            }

        }

        return $child;
    }

    public function getUpdatedRoutes() : array
    {
        $childRoutes = $this->buildChildRoutes($this->directory);

        foreach ($childRoutes as $routeName => $config) {
            if (array_key_exists($routeName, $this->routes['api']['child_routes'])) {
                $this->routes['api']['child_routes'][$routeName] = array_merge_recursive(
                    $this->routes['api']['child_routes'][$routeName],
                    $childRoutes[$routeName]
                );
            }
        }

        return $this->routes;
    }
}