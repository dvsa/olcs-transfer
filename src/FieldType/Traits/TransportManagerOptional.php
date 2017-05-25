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
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $transportManager;

    /**
     * Get transport manager
     *
     * @return int
     */
    public function getTransportManager()
    {
        return $this->transportManager;
    }

    /**
     * Set transport manager id
     *
     * @param int $tmId transport manager id
     *
     * @return void
     */
    public function setTransportManager($tmId)
    {
        $this->transportManager = (int) $tmId;
    }
}
