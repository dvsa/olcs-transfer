<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait TeamOptional
{
    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     */
    protected $team;

    public function getTeam(): ?int
    {
        return $this->team;
    }
}
