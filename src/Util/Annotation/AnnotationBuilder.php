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
use Zend\Filter\FilterPluginManager;
use Zend\Filter\StripTags as Escaper;
use Zend\Validator\ValidatorPluginManager;
use Zend\InputFilter\InputFilter;

/**
 * Annotation Builder
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class AnnotationBuilder
{
    protected $filterManager;
    protected $validatorManager;

    /**
     * @return mixed
     */
    public function getFilterManager()
    {
        if ($this->filterManager === null) {
            $this->filterManager = new FilterPluginManager();
        }
        return $this->filterManager;
    }

    /**
     * @param mixed $filterManager
     */
    public function setFilterManager($filterManager)
    {
        $this->filterManager = $filterManager;
    }

    /**
     * @return mixed
     */
    public function getValidatorManager()
    {
        if ($this->validatorManager === null) {
            $this->validatorManager = new ValidatorPluginManager();
        }
        return $this->validatorManager;
    }

    /**
     * @param mixed $validatorManager
     */
    public function setValidatorManager($validatorManager)
    {
        $this->validatorManager = $validatorManager;
    }


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

        $filterChain = $this->getNewFilterChain();
        $validatorChain = new \Zend\Validator\ValidatorChain();

        $escape = true;

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

            if ($annotation instanceof Escape) {
                $escape = $annotation->getEscape();
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

        if ($escape) {
            $escapeFilter = new Escaper();
            $filterChain->attach($escapeFilter);
        }

        $this->attachFiltersAndValidators($propertyAnnotations, $filterChain, $validatorChain, $input);

        $input->setFilterChain($filterChain);
        $input->setValidatorChain($validatorChain);

        return $input;
    }

    protected function attachFiltersAndValidators($annotations, $filterChain, $validatorChain, $input)
    {
        foreach ($annotations as $annotation) {

            if (!($annotation instanceof ArrayFilter) && $annotation instanceof Filter) {
                $filterChain->attachByName($annotation->getName(), $annotation->getOptions());
                continue;
            }

            if (!($annotation instanceof ArrayValidator) && $annotation instanceof Validator) {
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

    /**
     * @return \Zend\Filter\FilterChain
     */
    protected function getNewFilterChain()
    {
        $filterChain = new \Zend\Filter\FilterChain();
        $filterChain->setPluginManager($this->getFilterManager());
        return $filterChain;
    }
}
