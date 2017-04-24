<?php

/**
 * Create ConditionUndertaking
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\ConditionUndertaking;

use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\CasesOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\LicenceOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/condition-undertaking")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    use LicenceOptional,
        ApplicationOptional,
        CasesOptional;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"cdt_con", "cdt_und"}}})
     */
    protected $type;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {"cu_cat_env", "cu_cat_busreg", "cu_cat_fin", "cu_cat_other"}
     *      }
     *  }
     * )
     */
    protected $conditionCategory;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":5,"max":8000}})
     */
    protected $notes;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $fulfilled;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"cat_lic", "cat_oc"}}})
     */
    protected $attachedTo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $operatingCentre;

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get condition category
     *
     * @return string
     */
    public function getConditionCategory()
    {
        return $this->conditionCategory;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Get fulfilled
     *
     * @return string
     */
    public function getFulfilled()
    {
        return $this->fulfilled;
    }

    /**
     * Get attached to
     *
     * @return string
     */
    public function getAttachedTo()
    {
        return $this->attachedTo;
    }

    /**
     * Get operating centre id
     *
     * @return int
     */
    public function getOperatingCentre()
    {
        return $this->operatingCentre;
    }
}
