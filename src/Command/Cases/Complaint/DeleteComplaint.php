<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Complaint;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/complaint")
 * @Transfer\Method("DELETE")
 */
class DeleteComplaint extends AbstractCommand
{
    /**
     * @todo add validators
     */
    protected $id = null;

    /**
     * @todo add validators
     */
    protected $version = null;

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
}
