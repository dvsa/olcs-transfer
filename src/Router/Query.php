<?php

/**
 * Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Router;

use Laminas\Router\Http\Query as LaminasQuery;
use Laminas\Stdlib\RequestInterface as Request;
use Laminas\Router\Http\RouteMatch;

/**
 * Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Query extends LaminasQuery
{
    public function __construct(array $defaults = array())
    {
        $this->defaults = $defaults;
    }

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
