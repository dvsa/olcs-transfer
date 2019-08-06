<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Category Optional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Andy Newton <andy@vitri.ltd>
 */
trait CategoryOptional
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $category;

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }
}
