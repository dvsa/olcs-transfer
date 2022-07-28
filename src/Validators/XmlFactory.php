<?php

namespace Dvsa\Olcs\Transfer\Validators;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;
use Laminas\Xml\Security as XmlSecurityValidator;

/**
 * Class XmlFactory
 * @package Dvsa\Olcs\Transfer\Validators
 */
class XmlFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): Xml
    {
        $service = new Xml();
        $service->setSecurityValidator($container->getServiceLocator()->get(XmlSecurityValidator::class));

        return $service;
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     * @deprecated Not needed in Laminas 3
     */
    public function createService(ServiceLocatorInterface $serviceLocator): Xml
    {
        return $this($serviceLocator, Xml::class);
    }
}
