<?php

/**
 * Filter
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Laminas\Form\Annotation\Filter as LaminasFilter;

/**
 * @Annotation
 * @NamedArgumentConstructor
 */
class Filter
{
    protected LaminasFilter $filter;

    public function __construct(array $annotation)
    {
        // To avoid the migration path for annotations: `laminas/laminas-form:^2` -> `laminas/laminas-form:^3` -> PHP 8 native annotations.
        // Can just be: `laminas/laminas-form:^2` -> PHP 8 native annotations. Once PHP 8 is available.
        // Rector: https://github.com/rectorphp/rector/blob/main/rules/Php80/Rector/Class_/AnnotationToAttributeRector.php
        $name = $annotation['name'];
        $options = $annotation['options'] ?? [];
        $priority = $annotation['priority'] ?? null;

        $this->filter = new LaminasFilter($name, $options, $priority);
    }

    public function __call($name, $arguments)
    {
        return $this->filter->{$name}($arguments);
    }

    public function getName()
    {
        $spec = $this->getFilterSpecification();

        return $spec['name'];
    }

    public function getOptions()
    {
        $spec = $this->getFilterSpecification();

        if (empty($spec['options'])) {
            return null;
        }

        return $spec['options'];
    }
}
