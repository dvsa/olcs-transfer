<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait NonPiTypeOptional
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait NonPiTypeOptional
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
    protected $nonPiType;

    /**
     * @return string
     */
    public function getNonPiType()
    {
        return $this->nonPiType;
    }
}
