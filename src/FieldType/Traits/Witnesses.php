<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Witnesses
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait Witnesses
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     */
    protected $witnesses;

    /**
     * @return int
     */
    public function getWitnesses()
    {
        return $this->witnesses;
    }
}
