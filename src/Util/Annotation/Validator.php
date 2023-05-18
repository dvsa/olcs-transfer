<?php

/**
 * Validator
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Dvsa\Olcs\Transfer\Traits\LaminasFormVersionTrait;
use Laminas\Form\Annotation\Validator as LaminasValidator;

/**
 * @Annotation
 * @NamedArgumentConstructor
 */
class Validator
{
    use LaminasFormVersionTrait;

    protected LaminasValidator $validator;

    public function __construct(array $annotation)
    {
        // To avoid the migration path for annotations: `laminas/laminas-form:^2` -> `laminas/laminas-form:^3` -> PHP 8 native annotations.
        // Can just be: `laminas/laminas-form:^2` -> PHP 8 native annotations. Once PHP 8 is available.
        // Rector: https://github.com/rectorphp/rector/blob/main/rules/Php80/Rector/Class_/AnnotationToAttributeRector.php
        if ($this->isLaminasForm2()) {
            $this->validator = new LaminasValidator($annotation);
        } else {
            $name = $annotation['value']['name'];
            $options = $annotation['value']['options'] ?? [];
            $breakChainOnFailure = $annotation['value']['breakChainOnFailure'] ?? null;
            $priority = $annotation['value']['priority'] ?? null;

            $this->validator = new LaminasValidator($name, $options, $breakChainOnFailure, $priority);
        }
    }

    public function __call($name, $arguments)
    {
        return $this->validator->{$name}($arguments);
    }

    public function getName()
    {
        $spec = $this->getSpec();

        return $spec['name'];
    }

    public function getOptions()
    {
        $spec = $this->getSpec();

        if (empty($spec['options'])) {
            return null;
        }

        return $spec['options'];
    }

    /** get spec based on different Laminas versions */
    private function getSpec(): array
    {
        if ($this->isLaminasForm2()) {
            return $this->getValidator();
        }

        return $this->getValidatorSpecification();
    }
}
