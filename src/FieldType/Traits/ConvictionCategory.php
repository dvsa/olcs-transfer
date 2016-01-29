<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait ConvictionCategory
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait ConvictionCategory
{
    /**
     * @var String
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
