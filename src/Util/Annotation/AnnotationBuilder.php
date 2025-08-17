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
use Laminas\Filter\FilterPluginManager;
use Laminas\Filter\StripTags as Escaper;
use Laminas\InputFilter\Input;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator\ValidatorPluginManager;

/**
 * Annotation Builder
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
class AnnotationBuilder
{
    public function __construct(
        private readonly InputFilter $inputFilter,
        private readonly FilterPluginManager $filterManager,
        private readonly ValidatorPluginManager $validatorManager,
        private readonly AnnotationReader $annotationReader
    ) {
    }

    public function createQuery($dto): QueryContainer
    {
        $reflectedDto = new \ReflectionClass($dto);

        $classAnnotations = $this->annotationReader->getClassAnnotations($reflectedDto);

        $routeName = null;

        $inputFilter = $this->inputFilter;

        foreach ($classAnnotations as $annotation) {
            if ($annotation instanceof RouteName) {
                $routeName = $annotation->getRouteName();
            }

            if ($annotation instanceof Filter) {
                $inputFilterClass = $annotation->getName();
                $inputFilter = new $inputFilterClass();
            }
        }

        if ($routeName === null) {
            throw new \RuntimeException('No RouteName defined in the Query\'s annotations');
        }

        $query = new QueryContainer();
        $query->setInputFilter($inputFilter);
        $query->setRouteName($routeName);
        $query->setDto($dto);

        foreach ($reflectedDto->getProperties() as $property) {
            $inputFilter->add($this->processProperty($property));
        }

        return $query;
    }

    public function createCommand($dto): CommandContainer
    {
        $reflectedDto = new \ReflectionClass($dto);

        $classAnnotations = $this->annotationReader->getClassAnnotations($reflectedDto);

        $routeName = null;
        $method = null;

        $inputFilter = $this->inputFilter;

        foreach ($classAnnotations as $annotation) {
            if ($annotation instanceof RouteName) {
                $routeName = $annotation->getRouteName();
            }

            if ($annotation instanceof Method) {
                $method = $annotation->getMethod();
            }

            if ($annotation instanceof Filter) {
                $inputFilterClass = $annotation->getName();
                $inputFilter = new $inputFilterClass();
            }
        }

        if ($routeName === null) {
            throw new \RuntimeException('No RouteName defined in the Command\'s annotations');
        }

        if ($method === null) {
            throw new \RuntimeException('No Method defined in the Command\'s annotations');
        }

        $command = new CommandContainer();

        $command->setInputFilter($inputFilter);
        $command->setRouteName($routeName);
        $command->setMethod($method);
        $command->setDto($dto);

        foreach ($reflectedDto->getProperties() as $property) {
            $inputFilter->add($this->processProperty($property));
        }

        return $command;
    }

    protected function createPartial($partial, $name, $filterChain, $validatorChain): StructuredInput
    {
        $reflectedPartial = new \ReflectionClass($partial);

        $input = new StructuredInput($name);

        foreach ($reflectedPartial->getProperties() as $property) {
            $input->add($this->processProperty($property));
        }

        $classAnnotations = $this->annotationReader->getClassAnnotations($reflectedPartial);
        $this->attachFiltersAndValidators($classAnnotations, $filterChain, $validatorChain, $input);

        return $input;
    }

    protected function processProperty(\ReflectionProperty $property)
    {
        $propertyAnnotations = $this->annotationReader->getPropertyAnnotations($property);

        $isArrayInput = false;
        $input = null;

        $filterChain = $this->getNewFilterChain();
        $validatorChain = $this->getNewValidatorChain();

        $escape = true;

        $arrayFilterChain = $this->getNewFilterChain();
        $arrayValidatorChain = $this->getNewValidatorChain();

        // Determine what type of input we have
        foreach ($propertyAnnotations as $annotation) {
            if ($annotation instanceof ArrayInput) {
                $isArrayInput = $annotation->getArrayInput();

                $input = new \Dvsa\Olcs\Transfer\Util\ArrayInput($property->getName());

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
            $input = new Input($property->getName());
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
                $options = $annotation->getOptions();

                if (isset($options['usePluginManager']) && $options['usePluginManager']) {
                    $validatorChain->attach($this->validatorManager->get($annotation->getName()));
                    continue;
                }

                $validatorChain->attachByName($annotation->getName(), $annotation->getOptions());
                continue;
            }

            if ($annotation instanceof Optional) {
                $input->setRequired(false);
                $input->setAllowEmpty(true);
                continue;
            }

            if ($annotation instanceof ContinueIfEmpty) {
                $input->setRequired(true);
                $input->setContinueIfEmpty(true);
                continue;
            }
        }
    }

    private function getNewFilterChain(): FilterChain
    {
        $filterChain = new \Laminas\Filter\FilterChain();
        $filterChain->setPluginManager($this->filterManager);
        return $filterChain;
    }

    private function getNewValidatorChain(): ValidatorChain
    {
        $validatorChain = new \Laminas\Validator\ValidatorChain();
        $validatorChain->setPluginManager($this->validatorManager);
        return $validatorChain;
    }
}
