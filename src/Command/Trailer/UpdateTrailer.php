<?php

/**
 * Update Trailer
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Trailer;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/trailers")
 * @Transfer\Method("PUT")
 */
final class UpdateTrailer extends AbstractCommand
{
    /**
     * @var int
     * @todo validation
     */
    protected $trailerNo;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTrailerNo()
    {
        return $this->trailerNo;
    }
}
