<?php

namespace Dvsa\OlcsTest\Transfer\Validators;

use Dvsa\Olcs\Transfer\Validators\Xml as XmlValidator;
use Dvsa\Olcs\Transfer\Validators\XmlFactory as XmlFactory;
use Laminas\Xml\Security as XmlSecurityValidator;
use Mockery\Adapter\Phpunit\MockeryTestCase as TestCase;
use Mockery as m;
use Laminas\ServiceManager\ServiceLocatorInterface;

/**
 * Class XmlFactoryTest
 * @package Dvsa\OlcsTest\Transfer\Validators
 */
class XmlFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $mockXmlSecurity = m::mock(XmlSecurityValidator::class);

        $mockSl = m::mock(ServiceLocatorInterface::class);
        $mockSl->shouldReceive('getServiceLocator')->andReturnSelf();
        $mockSl->shouldReceive('get')->with(XmlSecurityValidator::class)->andReturn($mockXmlSecurity);

        $sut = new XmlFactory();
        $service = $sut->createService($mockSl);

        $this->assertInstanceOf(XmlValidator::class, $service);
        $this->assertInstanceOf(XmlSecurityValidator::class, $service->getSecurityValidator());
    }
}
