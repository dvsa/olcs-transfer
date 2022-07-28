<?php

namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\FactoryInterface;
use Laminas\ServiceManager\ServiceLocatorInterface;

/**
 * Class AnnotationBuilderFactory - injects validator manager and filter manager to allow transfer objects to use
 * custom filters/validators
 * @package Dvsa\Olcs\Transfer\Util\Annotation
 */
class AnnotationBuilderFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AnnotationBuilder
    {
        $service = new AnnotationBuilder();
        $service->setFilterManager($container->get('FilterManager'));
        $service->setValidatorManager($container->get('ValidatorManager'));

        return $service;
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     * @deprecated Not needed for Laminas 3
     */
    public function createService(ServiceLocatorInterface $serviceLocator): AnnotationBuilder
    {
        return $this($serviceLocator, AnnotationBuilder::class);
    }
}
