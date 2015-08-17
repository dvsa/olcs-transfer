<?php

/**
 * Print PSV discs
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\PsvDisc;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/psv-disc/print-discs")
 * @Transfer\Method("POST")
 */
final class PrintDiscs extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"ltyp_r","ltyp_sn","ltyp_si","ltyp_sr"}}})
     * @Transfer\Optional
     */
    public $licenceType;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    public $startNumber;

    public function getLicenceType()
    {
        return $this->licenceType;
    }

    public function getStartNumber()
    {
        return $this->startNumber;
    }
}
