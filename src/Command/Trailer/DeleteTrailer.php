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
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $ids = [];

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }
}
