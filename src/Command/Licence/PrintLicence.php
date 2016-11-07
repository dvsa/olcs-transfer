<?php

/**
 * Print Licence
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/print-document")
 * @Transfer\Method("POST")
 */
final class PrintLicence extends AbstractCommand
{
    use Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $isDispatch = true;

    /**
     * Is Dispatch
     *
     * @return mixed
     */
    public function isDispatch()
    {
        return $this->isDispatch;
    }
}
