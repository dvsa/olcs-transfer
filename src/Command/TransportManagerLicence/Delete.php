<?php

/**
 * Delete a transport manager from a licence
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\TransportManagerLicence;

use Dvsa\Olcs\Transfer\FieldType\Traits\Ids;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/transport-manager-licence")
 * @Transfer\Method("DELETE")
 */
final class Delete extends AbstractCommand
{
    use Ids;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $yesNo = null;

    /**
     * @param mixed $yesNo
     *
     * @return void
     */
    public function setYesNo($yesNo)
    {
        $this->yesNo = $yesNo;
    }

    /**
     * @return mixed
     *
     */
    public function getYesNo()
    {
        return $this->yesNo;
    }
}
