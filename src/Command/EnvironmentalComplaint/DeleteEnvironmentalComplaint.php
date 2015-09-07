<?php

namespace Dvsa\Olcs\Transfer\Command\EnvironmentalComplaint;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractDeleteCommand;

/**
 * Concrete delete class.
 *
 * @Transfer\RouteName("backend/environmental-complaint/single")
 * @Transfer\Method("DELETE")
 */
class DeleteEnvironmentalComplaint extends AbstractDeleteCommand
{
    /**
     * @Transfer\Optional()
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Validator({"name":"Zend\Validator\Identical", "options": {"token": false}})
     */
    protected $isCompliance = false;

    /**
     * @return bool
     */
    public function getIsCompliance()
    {
        return $this->isCompliance;
    }
}
