<?php

/**
 * Update Interim
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractUpdateInterim;

/**
* @Transfer\RouteName("backend/application/single/interim")
* @Transfer\Method("PUT")
*/
final class UpdateInterim extends AbstractUpdateInterim
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 1, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $authVehicles;
}
