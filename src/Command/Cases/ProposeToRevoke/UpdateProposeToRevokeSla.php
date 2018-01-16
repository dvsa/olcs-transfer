<?php

/**
 * Update ProposeToRevokeSla
 */
namespace Dvsa\Olcs\Transfer\Command\Cases\ProposeToRevoke;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/propose-to-revoke-sla/single")
 * @Transfer\Method("PUT")
 */
final class UpdateProposeToRevokeSla extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {1, 0}}})
     */
    protected $isSubmissionRequiredForApproval;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $approvalSubmissionIssuedDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $approvalSubmissionReturnedDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $approvalSubmissionPresidingTc;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $iorLetterIssuedDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $operatorResponseDueDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $operatorResponseReceivedDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {1, 0}}})
     */
    protected $isSubmissionRequiredForAction;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $finalSubmissionIssuedDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $finalSubmissionReturnedDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $finalSubmissionPresidingTc;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {"haystack": {
     *          "ptr_action_to_be_taken_revoke",
     *          "ptr_action_to_be_taken_pi",
     *          "ptr_action_to_be_taken_warning",
     *          "ptr_action_to_be_taken_nfa",
     *          "ptr_action_to_be_taken_other"
     *      }}
     *  }
     * )
     *
     */
    protected $actionToBeTaken;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $revocationLetterIssuedDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $nfaLetterIssuedDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $warningLetterIssuedDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $piAgreedDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     */
    protected $otherActionAgreedDate;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @return mixed
     */
    public function getIsSubmissionRequiredForApproval()
    {
        return $this->isSubmissionRequiredForApproval;
    }

    /**
     * @return mixed
     */
    public function getApprovalSubmissionIssuedDate()
    {
        return $this->approvalSubmissionIssuedDate;
    }

    /**
     *
     * @return mixed
     */
    public function getApprovalSubmissionReturnedDate()
    {
        return $this->approvalSubmissionReturnedDate;
    }

    /**
     * @return mixed
     */
    public function getApprovalSubmissionPresidingTc()
    {
        return $this->approvalSubmissionPresidingTc;
    }

    /**
     * @return mixed
     */
    public function getIorLetterIssuedDate()
    {
        return $this->iorLetterIssuedDate;
    }

    /**
     * @return mixed
     */
    public function getOperatorResponseDueDate()
    {
        return $this->operatorResponseDueDate;
    }

    /**
     * @return mixed
     */
    public function getOperatorResponseReceivedDate()
    {
        return $this->operatorResponseReceivedDate;
    }

    /**
     * @return mixed
     */
    public function getIsSubmissionRequiredForAction()
    {
        return $this->isSubmissionRequiredForAction;
    }

    /**
     * @return mixed
     */
    public function getFinalSubmissionIssuedDate()
    {
        return $this->finalSubmissionIssuedDate;
    }

    /**
     * @return mixed
     */
    public function getFinalSubmissionReturnedDate()
    {
        return $this->finalSubmissionReturnedDate;
    }

    /**
     * @return mixed
     */
    public function getFinalSubmissionPresidingTc()
    {
        return $this->finalSubmissionPresidingTc;
    }

    /**
     * @return mixed
     */
    public function getActionToBeTaken()
    {
        return $this->actionToBeTaken;
    }

    /**
     * @return mixed
     */
    public function getRevocationLetterIssuedDate()
    {
        return $this->revocationLetterIssuedDate;
    }

    /**
     * @return mixed
     */
    public function getNfaLetterIssuedDate()
    {
        return $this->nfaLetterIssuedDate;
    }

    /**
     * @return mixed
     */
    public function getWarningLetterIssuedDate()
    {
        return $this->warningLetterIssuedDate;
    }

    /**
     * @return mixed
     */
    public function getPiAgreedDate()
    {
        return $this->piAgreedDate;
    }

    /**
     * @return mixed
     */
    public function getOtherActionAgreedDate()
    {
        return $this->otherActionAgreedDate;
    }
}
