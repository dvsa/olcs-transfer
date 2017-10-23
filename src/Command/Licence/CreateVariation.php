<?php

/**
 * Create Variation
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */

namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/variation")
 * @Transfer\Method("POST")
 */
final class CreateVariation extends AbstractCommand
{
    use Identity;

    /**
     * @Transfer\Optional
     */
    protected $receivedDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToUpper"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {"haystack": {"Y","N"}}
     * })
     * @Transfer\Optional
     */
    protected $feeRequired;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {"haystack": {"ltyp_r","ltyp_sn","ltyp_si","ltyp_sr"}}
     * })
     * @Transfer\Optional
     */
    protected $licenceType;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray", "options": {
     *          "haystack": {"applied_via_post","applied_via_phone"}
     *      }
     *  }
     * )
     * @Transfer\Optional
     */
    protected $appliedVia;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray", "options": {
     *          "haystack": {"vtyp_director_change"}
     *      }
     *  }
     * )
     * @Transfer\Optional
     *
     * @var string|null
     */
    protected $variationType;

    /**
     * @return mixed
     */
    public function getReceivedDate()
    {
        return $this->receivedDate;
    }

    /**
     * @return mixed
     */
    public function getFeeRequired()
    {
        return $this->feeRequired;
    }

    /**
     * @return mixed
     */
    public function getLicenceType()
    {
        return $this->licenceType;
    }

    /**
     * @return mixed
     */
    public function getAppliedVia()
    {
        return $this->appliedVia;
    }

    /**
     * Get the value of variationType
     *
     * @return string|null
     */
    public function getVariationType()
    {
        return $this->variationType;
    }
}
