<?php

/**
 * updateCandidatePermitSelection
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/irhp-application/update-candidate-permit-selection")
 * @Transfer\Method("PUT")
 */
class UpdateCandidatePermitSelection extends AbstractCommand
{
    use Identity;

    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $selectedCandidatePermitIds;

    /**
     * @return array
     */
    public function getSelectedCandidatePermitIds()
    {
        return $this->selectedCandidatePermitIds;
    }
}
