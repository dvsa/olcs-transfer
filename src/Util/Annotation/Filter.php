<?php

/**
 * Filter
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Dvsa\Olcs\Transfer\Traits\LaminasFormVersionTrait;
use Laminas\Form\Annotation\Filter as LaminasFilter;

/**
 * @Annotation
 * @NamedArgumentConstructor
 */
class Filter
{
    use LaminasFormVersionTrait;

    protected LaminasFilter $filter;

    public function __construct(array $annotation)
    {
        // To avoid the migration path for annotations: `laminas/laminas-form:^2` -> `laminas/laminas-form:^3` -> PHP 8 native annotations.
        // Can just be: `laminas/laminas-form:^2` -> PHP 8 native annotations. Once PHP 8 is available.
        // Rector: https://github.com/rectorphp/rector/blob/main/rules/Php80/Rector/Class_/AnnotationToAttributeRector.php
        if ($this->isLaminasForm2()) {
            //laminas 2 code path
            $this->filter = new LaminasFilter($annotation);
        } else {
            //laminas 3 code path
            $name = $annotation['value']['name'];
            $options = $annotation['value']['options'] ?? [];
            $priority = $annotation['value']['priority'] ?? null;

            $this->filter = new LaminasFilter($name, $options, $priority);
        }
    }

    public function __call($name, $arguments)
    {
        return $this->filter->{$name}($arguments);
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
            return $this->getFilter();
        }

        return $this->getFilterSpecification();
    }
}
