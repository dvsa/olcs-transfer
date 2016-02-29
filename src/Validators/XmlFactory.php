<?php

namespace Dvsa\Olcs\Transfer\Validators;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZendXml\Security as XmlSecurityValidator;

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
        $service->setSecurityValidator(new XmlSecurityValidator());

        return $service;
    }
}
