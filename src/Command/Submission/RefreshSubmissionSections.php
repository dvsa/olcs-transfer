<?php

/**
 * Update Submission sections. Leave any other sections as is. Just update sections passed in Command
 */
namespace Dvsa\Olcs\Transfer\Command\Submission;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/submission/refresh")
 * @Transfer\Method("PUT")
 */
final class RefreshSubmissionSections extends AbstractCommand
{
    // Identity & Locking
    use FieldType\Traits\Identity;
    use FieldType\Traits\Version;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\SubmissionSection"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     */
    protected $sections;

    /**
     * @return mixed
     */
    public function getSections()
    {
        return $this->sections;
    }
}
