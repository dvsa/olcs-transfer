<?php
declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait HasUndertakenTraining
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y","N"}}})
     */
    protected $hasUndertakenTraining;

    /**
     * @return ?string
     */
    public function getHasUndertakenTraining(): ?string
    {
        return $this->hasUndertakenTraining;
    }
}
