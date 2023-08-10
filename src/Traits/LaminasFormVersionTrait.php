<?php

namespace Dvsa\Olcs\Transfer\Traits;

trait LaminasFormVersionTrait
{
    /** if we're on Laminas Form 2 then the AbstractArrayAnnotation class will exist */
    public function isLaminasForm2(): bool
    {
        return class_exists('\Laminas\Form\Annotation\AbstractArrayAnnotation');
    }
}
