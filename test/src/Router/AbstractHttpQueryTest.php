<?php

namespace Dvsa\OlcsTest\Transfer\Router;

use Dvsa\OlcsTest\Transfer\Router\AbstractHttpQueryStub;
use Zend\Http\Request;
use Zend\Mvc\Router\Exception;
use Zend\Mvc\Router\Http\RouteMatch as Match;
use Mockery as m;
use Zend\Uri\Uri;

class AbstractHttpQueryTest extends \PHPUnit_Framework_TestCase
{

    public function testGetAssembledParams()
    {
        $sut = new AbstractHttpQueryStub();
        $this->assertSame([], $sut->getAssembledParams());
    }

    public function testFactoryArray()
    {
        $options = [
            'route' => 'som-route/[/:action][/:id][/]',
            'constraints' => [
                'action' => '(index|add|edit|delete)',
            ],
            'defaults' => [
                'action' => 'index',
            ],
        ];

        $query = new AbstractHttpQueryStub($options['defaults']);
        $factoredQuery = AbstractHttpQueryStub::factory($options);

        $this->assertEquals($query, $factoredQuery);
    }

    public function testFactoryArrayNoDefaults()
    {
        $options = [
            'route' => 'som-route/[/:action][/:id][/]',
            'constraints' => [
                'action' => '(index|add|edit|delete)',
            ]
        ];

        $query = new AbstractHttpQueryStub([]);
        $factoredQuery = AbstractHttpQueryStub::factory($options);

        $this->assertEquals($query, $factoredQuery);
    }

    public function testFactoryTraversable()
    {

        $options = [
            'route' => 'som-route/[/:action][/:id][/]',
            'constraints' => [
                'action' => '(index|add|edit|delete)',
            ],
            'defaults' => [
                'action' => 'index',
            ],
        ];

        $defaults = $options['defaults'];

        $options = new \ArrayObject($options);

        $query = new AbstractHttpQueryStub($defaults);

        $factoredQuery = AbstractHttpQueryStub::factory($options->getIterator());

        $this->assertEquals($query, $factoredQuery);
    }


    public function testFactoryException()
    {
        $this->expectException(Exception\InvalidArgumentException::class);
        AbstractHttpQueryStub::factory('string');
    }

    public function testMatch()
    {
        $defaults = ['action' => 'index'];
        $query = new AbstractHttpQueryStub($defaults);

        $routeMatch = new Match($defaults);
        $queryMatch = $query->match(new Request());

        $this->assertEquals($routeMatch, $queryMatch);
    }

    public function testAssemble()
    {
        $query = new AbstractHttpQueryStub();
        $params = [
            'a' =>'param_a',
            'b' =>'param_a',
        ];

        $mockUri = m::mock(Uri::class);
        $mockUri->shouldReceive('setQuery')->with($params)->andReturnSelf();

        $options = [
            'a' =>'param_a',
            'c' =>'param_c',
            'uri' => $mockUri
        ];

        $result = $query->assemble($params, $options);

        $this->assertEquals('', $result);
        $this->assertEquals(['a','b'], $query->getAssembledParams());
    }

    public function testRecursiveUrldecode()
    {
        $query = new AbstractHttpQueryStub();

        $encoded = [
            'one' => 'test%40gmail.com',
            'two' => 'spaced+words',
            'three' => [
                'thirtyone' => 'this%26that'
            ]
        ];

        $decoded = [
            'one' => 'test@gmail.com',
            'two' => 'spaced words',
            'three' => [
                'thirtyone' => 'this&that'
            ]
        ];

        $result = $query->recursiveUrldecode($encoded);
        $this->assertEquals($decoded, $result);
    }
}
