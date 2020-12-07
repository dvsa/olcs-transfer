<?php

/**
 * Create Trailer
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Trailer;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/trailers")
 * @Transfer\Method("POST")
 */
final class CreateTrailer extends AbstractCommand
{
    /**
     * @var string
     */
    protected $trailerNo;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    /**
     * @var string
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     */
    protected $specifiedDate;

    /**
     * @return string
     */
    public function getTrailerNo()
    {
        return $this->trailerNo;
    }

    /**
     * @return int
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * @return string
     */
    public function getSpecifiedDate()
    {
        return $this->specifiedDate;
    }
}
