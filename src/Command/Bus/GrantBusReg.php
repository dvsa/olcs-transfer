<?php

/**
 * Grant BusReg
 */
namespace Dvsa\Olcs\Transfer\Command\Bus;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/bus/single/decision/grant")
 * @Transfer\Method("PUT")
 */
final class GrantBusReg extends AbstractCommand
{
    use FieldType\Identity;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *         "haystack": {"brvr_route", "brvr_start_end", "brvr_stops", "brvr_timetable"}
     *     }
     * })
     * @Transfer\Optional
     */
    public $variationReasons = [];

    /**
     * Get variation reasons
     *
     * @return array
     */
    public function getVariationReasons()
    {
        return $this->variationReasons;
    }
}
