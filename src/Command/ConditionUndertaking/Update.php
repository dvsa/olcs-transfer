<?php

/**
 * Update ConditionUndertaking
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\ConditionUndertaking;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/condition-undertaking/single")
 * @Transfer\Method("PUT")
 */
final class Update extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"cdt_con", "cdt_und"}}})
     */
    protected $type;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {
     *          "haystack": {"cu_cat_env", "cu_cat_busreg", "cu_cat_fin", "cu_cat_other"}
     *      }
     *  }
     * )
     */
    protected $conditionCategory;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength","options":{"min":5,"max":8000}})
     */
    protected $notes;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $fulfilled;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"cat_lic", "cat_oc"}}})
     */
    protected $attachedTo;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
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
