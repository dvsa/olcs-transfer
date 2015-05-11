<?php

/**
 * Annotation Builder
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Doctrine\Common\Annotations\AnnotationReader;
use Dvsa\Olcs\Transfer\Query\Query;
use Dvsa\Olcs\Transfer\Command\Command;

/**
 * Annotation Builder
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class AnnotationBuilder
{
    protected $reader;

    public function setReader(AnnotationReader $reader)
    {
        $this->reader = $reader;
    }

    public function getReader()
    {
        if ($this->reader === null) {
            $this->setReader(new AnnotationReader());
        }

        return $this->reader;
    }

    public function createQuery($dto)
    {
        $reflectedDto = new \ReflectionClass($dto);

        $classAnnotations = $this->getReader()->getClassAnnotations($reflectedDto);

        $routeName = null;

        $inputFilterClass = '\Zend\InputFilter\InputFilter';

        foreach ($classAnnotations as $annotation) {
            if ($annotation instanceof RouteName) {
                $routeName = $annotation->getRouteName();
            }

            if ($annotation instanceof InputFilter) {
                $inputFilterClass = $annotation->getName();
            }
        }

        if ($routeName === null) {
            throw new \RuntimeException('No RouteName defined in the Query\'s annotations');
        }

        $query = new Query();
        $inputFilter = new $inputFilterClass();
        $query->setInputFilter($inputFilter);
        $query->setRouteName($routeName);
        $query->setDto($dto);

        foreach ($reflectedDto->getProperties() as $property) {
            $inputFilter->add($this->processProperty($property));
        }

        return $query;
    }

    public function createCommand($dto)
    {
        $reflectedDto = new \ReflectionClass($dto);

        $classAnnotations = $this->getReader()->getClassAnnotations($reflectedDto);

        $routeName = null;
        $method = null;
        $inputFilterClass = '\Zend\InputFilter\InputFilter';

        foreach ($classAnnotations as $annotation) {
            if ($annotation instanceof RouteName) {
                $routeName = $annotation->getRouteName();
            }

            if ($annotation instanceof Method) {
                $method = $annotation->getMethod();
            }

            if ($annotation instanceof InputFilter) {
                $inputFilterClass = $annotation->getName();
            }
        }

        if ($routeName === null) {
            throw new \RuntimeException('No RouteName defined in the Command\'s annotations');
        }

        if ($method === null) {
            throw new \RuntimeException('No Method defined in the Command\'s annotations');
        }

        $command = new Command();
        $inputFilter = new $inputFilterClass();
        $command->setInputFilter($inputFilter);
        $command->setRouteName($routeName);
        $command->setMethod($method);
        $command->setDto($dto);

        foreach ($reflectedDto->getProperties() as $property) {
            $inputFilter->add($this->processProperty($property));
        }

        return $command;
    }

    protected function processProperty(\ReflectionProperty $property)
    {
        $propertyAnnotations = $this->getReader()->getPropertyAnnotations($property);

        $input = new \Zend\InputFilter\Input($property->getName());
        $filterChain = new \Zend\Filter\FilterChain();
        $validatorChain = new \Zend\Validator\ValidatorChain();

        foreach ($propertyAnnotations as $annotation) {
            if ($annotation instanceof Filter) {
                $filterChain->attachByName($annotation->getName());
            }

            if ($annotation instanceof Validator) {
                $validatorChain->attachByName($annotation->getName(), $annotation->getOptions());
            }
        }

        $input->setFilterChain($filterChain);
        $input->setValidatorChain($validatorChain);

        return $input;
    }
}
