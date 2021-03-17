<?php

/**
 * Remove bilateral country
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * @Transfer\RouteName("backend/irhp-application/single/remove-bilateral-country")
 * @Transfer\Method("PUT")
 */
class UpdateCountries extends AbstractCommand
{
    use Traits\Identity;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min": 1, "max": 2}})
     */
    public $countryCode;
}
