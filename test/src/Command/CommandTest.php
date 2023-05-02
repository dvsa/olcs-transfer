<?php

namespace Dvsa\OlcsTest\Transfer\Command;

use Dvsa\Olcs\Transfer\Util\Annotation\AnnotationBuilder;

use Dvsa\OlcsTest\Transfer\DtoTest;
use Laminas\ServiceManager\ServiceManager;
use Laminas\Stdlib\ArraySerializableInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Laminas\Filter\FilterPluginManager;
use Laminas\Validator\ValidatorPluginManager;

trait CommandTest
{
    use DtoTest;

    protected function createDtoContainer(ArraySerializableInterface $dto)
    {
        $annotationBuilder = new AnnotationBuilder();

        $annotationBuilder->setFilterManager(new FilterPluginManager(new ServiceManager()));
        $annotationBuilder->setValidatorManager(new ValidatorPluginManager(new ServiceManager));
        $annotationBuilder->setReader(new AnnotationReader);

        return ($annotationBuilder)->createCommand($dto);
    }
}
