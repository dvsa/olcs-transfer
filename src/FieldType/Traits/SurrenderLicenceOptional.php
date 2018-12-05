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
    protected $licence;

    /**
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * @param int $licence
     *
     * @return  void
     */
    public function setLicence(int $licence): void
    {
        $this->licence = $licence;
    }
}
