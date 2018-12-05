<?php


namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait SurrenderIdOptional
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait SurrenderLicenceOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licenceId;

    /**
     * @return int
     */
    public function getLicenceId()
    {
        return $this->licenceId;
    }

    /**
     * @param int $licenceId
     *
     * @return  void
     */
    public function setLicenceId(int $licenceId): void
    {
        $this->licenceId = $licenceId;
    }
}
