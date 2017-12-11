<?php

namespace Dvsa\OlcsTest\Transfer\Query;

use Dvsa\Olcs\Transfer\Util\Annotation\AnnotationBuilder;
use Dvsa\OlcsTest\Transfer\DtoTest;
use Zend\Stdlib\ArraySerializableInterface;

trait QueryTest
{
    use DtoTest;

    protected function createDtoContainer(ArraySerializableInterface $dto)
    {
        $annotationBuilder = new AnnotationBuilder();
        return $annotationBuilder->createQuery($dto);
    }
}
