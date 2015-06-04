<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait TransportManagerOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait TransportManagerOptional
{
    use TransportManager;

    /**
     * @var int
     * @transfer\optional()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $transportManager;
}
