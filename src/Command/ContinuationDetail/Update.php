<?php

/**
 * Update ContinuationDetail
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\ContinuationDetail;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/continuation-detail/single")
 * @Transfer\Method("PUT")
 */
final class Update extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $received;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\ContinuationDetailStatus"})
     * @Transfer\Optional
     */
    protected $status;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Between", "options": {"min": 0, "max": 999999}})
     * @Transfer\Optional
     */
    protected $totAuthVehicles;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Between", "options": {"min": 0, "max": 999999}})
     * @Transfer\Optional
     */
    protected $totPsvDiscs;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Between", "options": {"min": 0, "max": 999999}})
     * @Transfer\Optional
     */
    protected $totCommunityLicences;

    public function getReceived()
    {
        return $this->received;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getTotAuthVehicles()
    {
        return $this->totAuthVehicles;
    }

    public function getTotPsvDiscs()
    {
        return $this->totPsvDiscs;
    }

    public function getTotCommunityLicences()
    {
        return $this->totCommunityLicences;
    }
}
