<?php

/**
 * Abstract Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query;

use Doctrine\Common\Annotations\AnnotationReader;
use Dvsa\Olcs\Transfer\Util\Annotation\DoNotExchange;
use ReflectionProperty;

/**
 * Abstract Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
abstract class AbstractQuery implements QueryInterface
{
    public static function create(array $data)
    {
        $command = new static();
        $command->exchangeArray($data);
        return $command;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        $values = get_object_vars($this);

        foreach (array_keys($values) as $property) {
            if (isset($array[$property]) && $this->doNotExchange($property) === false) {
                $this->$property = $array[$property];
            }
        }
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    private function doNotExchange($property) {
        $annotationReader = new AnnotationReader();
        $reflectionProperty = new ReflectionProperty(static::class, $property);
        $propertyAnnotations = $annotationReader->getPropertyAnnotations($reflectionProperty);

        if (count($propertyAnnotations) > 0) {
            foreach ($propertyAnnotations as $annotation) {
                if ($annotation instanceof DoNotExchange) {
                    return true;
                }
            }
        }

        return false;
    }
}
