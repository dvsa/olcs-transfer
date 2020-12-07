<?php

namespace Dvsa\Olcs\Transfer\Validators;

use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;
use Laminas\Xml\Security as XmlSecurityValidator;

/**
 * Class XmlFactory
 * @package Dvsa\Olcs\Transfer\Validators
 */
class XmlFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new Xml();
        $service->setSecurityValidator($serviceLocator->getServiceLocator()->get(XmlSecurityValidator::class));

        return $service;
    }
}
