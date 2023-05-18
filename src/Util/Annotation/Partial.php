<?php

/**
 * Partial
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use Dvsa\Olcs\Transfer\Traits\LaminasFormVersionTrait;
use Laminas\Form\Annotation\ComposedObject;

/**
 * @Annotation
 * @NamedArgumentConstructor
 */
class Partial
{
    use LaminasFormVersionTrait;

    protected ComposedObject $composedObject;

    public function __construct(array $data)
    {
        if ($this->isLaminasForm2()) {
            $this->composedObject = new ComposedObject($data);
        } else {
            $this->composedObject = new ComposedObject($data['value']);
        }
    }

    public function __call($name, $arguments)
    {
        return $this->composedObject->{$name}($arguments);
    }
}
