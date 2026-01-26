<?php

namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Doctrine\Common\Annotations\AnnotationReader;
use Dvsa\Olcs\Api\Service\InputFilter\Input;
use Laminas\Filter\FilterPluginManager;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterPluginManager;
use Laminas\Validator\ValidatorPluginManager;
use Psr\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

/**
 * Class AnnotationBuilderFactory - injects validator manager and filter manager to allow transfer objects to use
 * custom filters/validators
 * @package Dvsa\Olcs\Transfer\Util\Annotation
 */
class AnnotationBuilderFactory implements FactoryInterface
{
    #[\Override]
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null): AnnotationBuilder
    {
        return new AnnotationBuilder(
            $container->get(InputFilterPluginManager::class)->get(InputFilter::class),
            $container->get(FilterPluginManager::class),
            $container->get(ValidatorPluginManager::class),
            new AnnotationReader()
        );

        return $service;
    }
}
