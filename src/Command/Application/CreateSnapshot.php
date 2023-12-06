<?php

/**
 * Create Snapshot
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */

namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/application/single/snapshot")
 * @Transfer\Method("POST")
 */
final class CreateSnapshot extends AbstractCommand
{
    use Identity;

    /**
     * @Transfer\Optional
     */
    protected $event;

    /**
     * @return mixed
     */
    public function getEvent()
    {
        return $this->event;
    }
}
