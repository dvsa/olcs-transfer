<?php

/**
 * Create Submission
 */
namespace Dvsa\Olcs\Transfer\Command\Submission;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/submission")
 * @Transfer\Method("POST")
 */
final class CreateSubmission extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $case;

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
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\SubmissionSection"})
     */
    protected $sections;

    /**
     * @return mixed
     */
    public function getCase()
    {
        return $this->case;
    }

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
    public function getSections()
    {
        return $this->sections;
    }
}
