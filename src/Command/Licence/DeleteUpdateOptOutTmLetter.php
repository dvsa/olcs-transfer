<?php

namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/licence/single/delete-update-opt-out-tm-letter")
 * @Transfer\Method("PUT")
 */
final class DeleteUpdateOptOutTmLetter extends AbstractCommand
{
    use Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $yesNo;

    /**
     * @param mixed $yesNo
     */
    public function setYesNo($yesNo)
    {
        $this->yesNo = $yesNo;
    }

    /**
     * @return mixed
     */
    public function getYesNo()
    {
        return $this->yesNo;
    }

}