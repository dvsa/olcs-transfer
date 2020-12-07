<?php

/**
 * Update Financial Standing Rate
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\System;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * @Transfer\RouteName("backend/financial-standing-rate/single")
 * @Transfer\Method("PUT")
 */
final class UpdateFinancialStandingRate extends AbstractCommand
{
    use FieldTypeTraits\Identity,
        FieldTypeTraits\Version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"lcat_gv","lcat_psv"}}})
     * @Transfer\Optional
     */
    protected $goodsOrPsv;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Laminas\Validator\InArray",
     *      "options": {"haystack": {"ltyp_r","ltyp_sn","ltyp_si","ltyp_sr"}}
     * })
     * @Transfer\Optional
     */
    protected $licenceType;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Money"})
     */
    protected $firstVehicleRate;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Money"})
     */
    protected $additionalVehicleRate;

    /**
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    protected $effectiveFrom;

    /**
     * Gets the value of goodsOrPsv.
     *
     * @return mixed
     */
    public function getGoodsOrPsv()
    {
        return $this->goodsOrPsv;
    }

    /**
     * Gets the value of licenceType.
     *
     * @return mixed
     */
    public function getLicenceType()
    {
        return $this->licenceType;
    }

    /**
     * Gets the value of firstVehicleRate.
     *
     * @return mixed
     */
    public function getFirstVehicleRate()
    {
        return $this->firstVehicleRate;
    }

    /**
     * Gets the value of additionalVehicleRate.
     *
     * @return mixed
     */
    public function getAdditionalVehicleRate()
    {
        return $this->additionalVehicleRate;
    }

    /**
     * Gets the value of effectiveFrom.
     *
     * @return mixed
     */
    public function getEffectiveFrom()
    {
        return $this->effectiveFrom;
    }
}
