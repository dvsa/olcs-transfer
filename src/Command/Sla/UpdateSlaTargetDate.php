<?php

namespace Dvsa\Olcs\Transfer\Command\Sla;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/sla-target-date")
 * @Transfer\Method("POST")
 */
class UpdateSlaTargetDate extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\Version;

    /**
     * @var string
     * @Transfer\Validator({"name": "AgreedDate", "options": {"format": "Y-m-d"}})
     */
    protected $agreedDate;

    /**
     * @Transfer\Optional
     * @var string
     * @Transfer\Validator({"name": "TargetDate", "options": {"format": "Y-m-d"}})
     */
    protected $targetDate;

    /**
     * @Transfer\Optional
     * @var string
     * @Transfer\Validator({"name": "SentDate", "options": {"format": "Y-m-d"}})
     */
    protected $sentDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     */
    protected $underDelegation;

    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":5, "max":4000}})
     */
    protected $notes;

    /**
     * @return string
     */
    public function getAgreedDate()
    {
        return $this->agreedDate;
    }

    /**
     * @return string
     */
    public function getTargetDate()
    {
        return $this->targetDate;
    }

    /**
     * @return string
     */
    public function getSentDate()
    {
        return $this->sentDate;
    }

    /**
     * @return mixed
     */
    public function getUnderDelegation()
    {
        return $this->underDelegation;
    }

    /**
     * @return String
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
