<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Team
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
trait Team
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $team;

    /**
     * @return int
     */
    public function getTeam()
    {
        return $this->team;
    }
}
