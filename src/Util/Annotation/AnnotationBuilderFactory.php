<?php

namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AnnotationBuilderFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new AnnotationBuilder();
        $service->setFilterManager($serviceLocator->get('FilterManager'));
        $service->setValidatorManager($serviceLocator->get('ValidatorManager'));

        return $service;
    }
}
