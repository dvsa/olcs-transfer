<?php

namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

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
}
