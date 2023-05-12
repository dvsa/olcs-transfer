<?php

/**
 * Partial
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Laminas\Form\Annotation\ComposedObject;

/**
 * @Annotation
 * @NamedArgumentConstructor
 */
class Partial
{
    protected ComposedObject $composedObject;

    public function __construct($targetObject, bool $isCollection = false, array $options = [])
    {
        $this->composedObject = new ComposedObject($targetObject, $isCollection, $options);
    }

    public function __call($name, $arguments)
    {
        return $this->composedObject->{$name}($arguments);
    }

}
