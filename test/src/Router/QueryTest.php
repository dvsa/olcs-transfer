<?php

namespace Dvsa\OlcsTest\Transfer\Router;

use Dvsa\Olcs\Transfer\Router\Query;
use Zend\Http\Request;
use Zend\Mvc\Router\Http\RouteMatch as Match;
use Mockery as m;

class QueryTest extends \PHPUnit_Framework_TestCase
{
    public static $functions;

    public function testMatch()
    {
        $defaults = ['action' => 'index'];
        $query = new Query($defaults);

        $mockRequest = m::mock(Request::class);
        $mockRequest->shouldReceive('getMethod')->andReturn('GET');
        $routeMatch = new Match($defaults);
        /** @var Request $mockRequest */
        $queryMatch = $query->match($mockRequest);

        $this->assertEquals($routeMatch, $queryMatch);
    }

    public function testMatchPost()
    {
        $defaults = ['action' => 'index'];
        $query = new Query($defaults);

        $mockRequest = m::mock(Request::class);
        $mockRequest->shouldReceive('getMethod')->andReturn('POST');

        /** @var Request $mockRequest */
        $queryMatch = $query->match($mockRequest);

        $this->assertNull($queryMatch);
    }

    public function testMatchNoGetMethod()
    {

        $defaults = ['action' => 'index'];
        $query = new Query($defaults);

        $queryMatch = $query->match(new RequestWithoutGetMethodStub());

        $this->assertNull($queryMatch);
    }
}
