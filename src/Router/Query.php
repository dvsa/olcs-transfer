<?php

namespace Dvsa\Olcs\Transfer\Router;

use Dvsa\Olcs\Transfer\Router\LaminasRouterHttpQueryV2 as LaminasQuery;
use Laminas\Stdlib\RequestInterface as Request;
use Laminas\Router\Http\RouteMatch;

class Query extends LaminasQuery
{
    /**
     * match(): defined by RouteInterface interface.
     *
     * @see    \Laminas\Router\RouteInterface::match()
     * @param  Request $request
     * @return RouteMatch|null
     */
    public function match(Request $request)
    {
        if (!method_exists($request, 'getMethod')) {
            return null;
        }

        $requestVerb = strtoupper($request->getMethod());

        if ($requestVerb === 'GET') {
            return new RouteMatch($this->defaults);
        }

        return null;
    }
}
