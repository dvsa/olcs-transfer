<?php

namespace Dvsa\OlcsTest\Transfer\Router;

use Dvsa\Olcs\Transfer\Router\AbstractHttpQuery;

class AbstractHttpQueryStub extends AbstractHttpQuery
{
    public function recursiveUrldecode(array $array)
    {
        return parent::recursiveUrldecode($array);
    }
}
