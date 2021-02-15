<?php

namespace Dvsa\OlcsTest\Transfer\Command;

use Dvsa\Olcs\Transfer\Util\Annotation\AnnotationBuilder;
use Dvsa\OlcsTest\Transfer\DtoTest;
use Laminas\Stdlib\ArraySerializableInterface;

trait CommandTest
{
    use DtoTest;

    protected function createDtoContainer(ArraySerializableInterface $dto)
    {
        return (new AnnotationBuilder())->createCommand($dto);
    }
}
