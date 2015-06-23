<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait ConvictionCategory
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait ConvictionCategoryOptional
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":32}})
     */
    protected $convictionCategory;

    /**
     * @return string
     */
    public function getConvictionCategory()
    {
        return $this->convictionCategory;
    }
}
