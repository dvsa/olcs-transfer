<?php

namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Ids;

/**
 * @Transfer\RouteName("backend/licence/single/delete-update-opt-out-tm-letter")
 * @Transfer\Method("PUT")
 */
final class DeleteUpdateOptOutTmLetter extends AbstractCommand
{
    use Ids;

    /**

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