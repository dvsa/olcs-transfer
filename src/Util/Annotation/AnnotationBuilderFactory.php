<?php

namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

/**
 * Class AnnotationBuilderFactory - injects validator manager and filter manager to allow transfer objects to use
 * custom filters/validators
 * @package Dvsa\Olcs\Transfer\Util\Annotation
 */
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
