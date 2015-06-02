<?php

/**
 * Annotation Builder
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Doctrine\Common\Annotations\AnnotationReader;
use Dvsa\Olcs\Transfer\Query\QueryContainer;
use Dvsa\Olcs\Transfer\Command\CommandContainer;
use Dvsa\Olcs\Transfer\Util\StructuredInput;
use Zend\InputFilter\InputFilter;

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

        $query = new QueryContainer();
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

        $command = new CommandContainer();
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

    protected function createPartial($partial, $name, $filterChain, $validatorChain)
    {
        $reflectedPartial = new \ReflectionClass($partial);

        $input = new StructuredInput($name);

        foreach ($reflectedPartial->getProperties() as $property) {
            $input->add($this->processProperty($property));
        }

        $classAnnotations = $this->getReader()->getClassAnnotations($reflectedPartial);
        $this->attachFiltersAndValidators($classAnnotations, $filterChain, $validatorChain, $input);

        return $input;
    }

    protected function processProperty(\ReflectionProperty $property)
    {
        $propertyAnnotations = $this->getReader()->getPropertyAnnotations($property);

        $isArrayInput = false;
        $input = null;

        $filterChain = new \Zend\Filter\FilterChain();
        $validatorChain = new \Zend\Validator\ValidatorChain();

        // Determine what type of input we have
        foreach ($propertyAnnotations as $annotation) {
            if ($annotation instanceof ArrayInput) {
                $isArrayInput = $annotation->getArrayInput();

                $input = new \Dvsa\Olcs\Transfer\Util\ArrayInput($property->getName());

                $arrayFilterChain = new \Zend\Filter\FilterChain();
                $arrayValidatorChain = new \Zend\Validator\ValidatorChain();
                break;
            }

            if ($annotation instanceof Partial) {
                $input = $this->createPartial(
                    $annotation->getComposedObject(),
                    $property->getName(),
                    $filterChain,
                    $validatorChain
                );
                break;
            }
        }

        if ($input === null) {
            $input = new \Zend\InputFilter\Input($property->getName());
        }

        if ($isArrayInput) {
            foreach ($propertyAnnotations as $annotation) {

                if ($annotation instanceof ArrayFilter) {
                    $arrayFilterChain->attachByName($annotation->getName());
                    continue;
                }

                if ($annotation instanceof ArrayValidator) {
                    $arrayValidatorChain->attachByName($annotation->getName(), $annotation->getOptions());
                    continue;
                }
            }

            $input->setArrayFilterChain($arrayFilterChain);
            $input->setArrayValidatorChain($arrayValidatorChain);
        }

        $this->attachFiltersAndValidators($propertyAnnotations, $filterChain, $validatorChain, $input);

        $input->setFilterChain($filterChain);
        $input->setValidatorChain($validatorChain);

        return $input;
    }

    protected function attachFiltersAndValidators($annotations, $filterChain, $validatorChain, $input)
    {
        foreach ($annotations as $annotation) {
            if ($annotation instanceof Filter) {
                $filterChain->attachByName($annotation->getName());
                continue;
            }

            if ($annotation instanceof Validator) {
                $validatorChain->attachByName($annotation->getName(), $annotation->getOptions());
                continue;
            }

            if ($annotation instanceof Optional) {
                $input->setRequired(false);
                $input->setAllowEmpty(true);
                continue;
            }
        }
    }
}
