<?php

namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/update-opt-out-tm-letter")
 * @Transfer\Method("PUT")
 */
final class UpdateOptOutTmLetter extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $yesNo;

    /**
     * @return mixed
     */
    public function getYesNo()
    {
        return $this->yesNo;
    }

}
