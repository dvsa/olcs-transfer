<?php

/**
 * Delete Trailer
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Trailer;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/trailers")
 * @Transfer\Method("DELETE")
 */
final class DeleteTrailer extends AbstractCommand
{
    /**
     *
     */
    protected $ids;

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }
}
