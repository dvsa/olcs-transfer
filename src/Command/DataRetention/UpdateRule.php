<?php
namespace Dvsa\Olcs\Transfer\Command\DataRetention;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * @Transfer\RouteName("backend/data-retention/update-rule")
 * @Transfer\Method("POST")
 */
final class UpdateRule extends AbstractCommand
{
    use FieldTypeTraits\Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1}})
     */
    protected $description = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     */
    protected $retentionPeriod = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     */
    protected $maxDataSet = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {1, 0}}})
     */
    protected $isEnabled = null;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Automate", "Review"}}})
     */
    protected $actionType = null;

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get Retention period
     *
     * @return int
     */
    public function getRetentionPeriod()
    {
        return $this->retentionPeriod;
    }

    /**
     * Get Max data set
     *
     * @return int
     */
    public function getMaxDataSet()
    {
        return $this->maxDataSet;
    }

    /**
     * Get Is Enabled
     *
     * @return bool
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Get Action Type
     *
     * @return string
     */
    public function getActionType()
    {
        return $this->actionType;
    }
}
