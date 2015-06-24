<?php

/**
 * CreateSeperatorSheet
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Scan;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/scan/separator-sheet")
 * @Transfer\Method("POST")
 */
final class CreateSeparatorSheet extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $categoryId;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $subCategoryId;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $entityIdentifier;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $descriptionId;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $description;

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return int
     */
    public function getSubCategoryId()
    {
        return $this->subCategoryId;
    }

    /**
     * Get Entity Identifier, this could be an int entity ID or a string eg Licence Number
     *
     * @return int|string
     */
    public function getEntityIdentifier()
    {
        return $this->entityIdentifier;
    }

    /**
     * @return int
     */
    public function getDescriptionId()
    {
        return $this->descriptionId;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}