<?php

/**
 * Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Router;

use Zend\Mvc\Router\Http\Query as ZendQuery;

/**
 * Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class Query extends ZendQuery
{
    public function __construct(array $defaults = array())
    {
        $this->defaults = $defaults;
    }
}
