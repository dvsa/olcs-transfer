<?php

/**
 * Create ECMT Permit Application Country Link
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permits")
 * @Transfer\Method("PUT")
 */
final class CreateEcmtPermitCountry extends AbstractCommand
{

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $ecmtPermitId;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    public $countryId;


    public function getEcmtPermitId()
    {
        return $this->ecmtPermitId;
    }
    public function getCountryId()
    {
        return $this->countryId;
    }

}
