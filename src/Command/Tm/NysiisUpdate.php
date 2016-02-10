<?php

/**
 * Update Transport Manager
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Tm;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/transport-manager/single/nysiis-update")
 * @Transfer\Method("PUT")
 */
final class NysiisUpdate extends AbstractCommand
{
    // Identity & Locking
    use FieldType\Traits\Identity;
    use FieldType\Traits\Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 2, "max": 35}})
     */
    public $nysiisForename;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 2, "max": 35}})
     */
    public $nysiisFamilyname;

    /**
     * @return mixed
     */
    public function getNysiisForename()
    {
        return $this->nysiisForename;
    }

    /**
     * @return mixed
     */
    public function getNysiisFamilyname()
    {
        return $this->nysiisFamilyname;
    }
}
