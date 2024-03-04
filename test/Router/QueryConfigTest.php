<?php

namespace Dvsa\OlcsTest\Transfer\Router;

use Dvsa\Olcs\Transfer\Router\QueryConfig;
use Laminas\Http\Request;

class QueryConfigTest extends \PHPUnit\Framework\TestCase
{
    public function testGetConfig(): void
    {
        $config = QueryConfig::getConfig('Foo\Bar');

        $expected = [
            'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
            'options' => [
                'defaults' => [
                    'verb' => Request::METHOD_GET,
                    'dto' => 'Foo\Bar'
                ]
            ]
        ];

        $this->assertEquals($expected, $config);
    }
}
