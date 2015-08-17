<?php

/**
 * Get disc prefix
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\DiscSequence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/disc-sequence/disc-prefix")
 */
final class DiscPrefix extends AbstractQuery
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $discSequence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"ltyp_r","ltyp_sn","ltyp_si","ltyp_sr"}}})
     * @Transfer\Optional
     */
    protected $licenceType;

    /**
     * Get a licence statuses
     *
     * @return string
     */
    public function getDiscSequence()
    {
        return $this->discSequence;
    }

    /**
     * Get an application statuses
     *
     * @return string
     */
    public function getLicenceType()
    {
        return $this->licenceType;
    }
}
