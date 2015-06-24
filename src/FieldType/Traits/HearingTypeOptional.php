<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait HearingType
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait HearingTypeOptional
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "non_pi_type_off_proc",
     *              "non_pi_type_in_cham"
     *          }
     *      }
     * })
     */
    protected $hearingType;

    /**
     * @return string
     */
    public function getHearingType()
    {
        return $this->hearingType;
    }
}
