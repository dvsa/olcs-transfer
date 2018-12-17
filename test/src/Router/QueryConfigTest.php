<?php

namespace Dvsa\OlcsTest\Transfer\Router;

use Dvsa\Olcs\Transfer\Router\QueryConfig;

/**
 * Query Config Test
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class QueryConfigTest extends \PHPUnit\Framework\TestCase
{
    public function testGetConfig()
    {
        $config = QueryConfig::getConfig('Foo\Bar');

        $expected = [
            'type' => \Dvsa\Olcs\Transfer\Router\Query::class,
            'options' => [
                'defaults' => [
                    'dto' => 'Foo\Bar'
                ]
            ]
        ];

        $this->assertEquals($expected, $config);
    }
}
