<?php

namespace Dvsa\Olcs\Transfer\Command\Cases;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/cases/pi/agreed")
 * @Transfer\Method("PUT")
 */
class UpdatePiAgreedAndLegislation extends AbstractCommand
{
    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $agreedDate;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $agreedByTc;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $agreedByTcRole;

    /**
     * @var array
     * @TODO filter + validate me (array validator???)
     */
    protected $piTypes;

    /**
     * @var array
     * @TODO filter + validate me (array validator???)
     */
    protected $reasons;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional()
     */
    protected $comment;

    /**
     * @return int
     */
    public function getCaseId()
    {
        return $this->caseId;
    }

    /**
     * @return string
     */
    public function getAgreedDate()
    {
        return $this->agreedDate;
    }

    /**
     * @return int
     */
    public function getAgreedByTc()
    {
        return $this->agreedByTc;
    }

    /**
     * @return string
     */
    public function getAgreedByTcRole()
    {
        return $this->agreedByTcRole;
    }

    /**
     * @return array
     */
    public function getPiTypes()
    {
        return $this->piTypes;
    }

    /**
     * @return array
     */
    public function getReasons()
    {
        return $this->reasons;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
