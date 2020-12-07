<?php


namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait SurrenderIdOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 */
trait SurrenderOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $surrender;

    /**
     * @return int
     */
    public function getSurrender()
    {
        return $this->surrender;
    }

    /**
     * @param int $surrender
     *
     * @return  void
     */
    public function setSurrender($surrender): void
    {
        $this->surrender = $surrender;
    }
}
