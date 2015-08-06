<?php

/**
 * Update Submission
 */
namespace Dvsa\Olcs\Transfer\Command\Submission;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/submission/single")
 * @Transfer\Method("PUT")
 */
final class UpdateSubmission extends AbstractCommand
{
    // Identity & Locking
    use FieldType\Traits\Identity;
    use FieldType\Traits\Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "submission_type_o_bus_reg", "submission_type_o_clo_fep", "submission_type_o_clo_g",
     * "submission_type_o_clo_psv", "submission_type_o_env", "submission_type_o_impounding",
     * "submission_type_o_irfo", "submission_type_o_mlh_clo", "submission_type_o_mlh_otc", "submission_type_o_otc",
     * "submission_type_o_schedule_41", "submission_type_o_tm"
     *          }
     *      }
     * })
     */
    protected $submissionType;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "introduction", "case-summary","case-outline", "most-serious-infringement",
     *  "outstanding-applications","persons","operating-centres","conditions-and-undertakings",
     * "intelligence-unit-check","interim","advertisement","linked-licences-app-numbers","lead-tc-area",
     * "current-submissions","auth-requested-applied-for","transport-managers","continuous-effective-control",
     * "fitness-and-repute","previous-history","bus-reg-app-details","transport-authority-comments",
     * "total-bus-registrations","local-licence-history","linked-mlh-history","registration-details",
     * "maintenance-tachographs-hours","prohibition-history","conviction-fpn-offence-history","annual-test-history",
     * "penalties","statements","other-issues","te-reports","site-plans","planning-permission","applicants-comments",
     * "visibility-access-egress-size","compliance-complaints","environmental-complaints","oppositions",
     * "financial-information","maps","waive-fee-late-fee","surrender","annex","tm-details","tm-qualifications",
     * "tm-responsibilities","tm-other-employment","tm-previous-history"
     *          }
     *      }
     * })
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     */
    protected $submissionSections;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $senderUser;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $recipientUser;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $urgent;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\Date"})
     * @Transfer\Optional
     */
    protected $closedDate;

    /**
     * @return mixed
     */
    public function getSubmissionType()
    {
        return $this->submissionType;
    }

    /**
     * @return mixed
     */
    public function getSubmissionSections()
    {
        return $this->submissionSections;
    }

    /**
     * @return mixed
     */
    public function getSenderUser()
    {
        return $this->senderUser;
    }

    /**
     * @return mixed
     */
    public function getRecipientUser()
    {
        return $this->recipientUser;
    }

    /**
     * @return mixed
     */
    public function getUrgent()
    {
        return $this->urgent;
    }

    /**
     * @return mixed
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }
}
