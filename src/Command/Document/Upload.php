<?php

/**
 * Upload
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Document;

use Dvsa\Olcs\Transfer\Command\LoggerOmitContentInterface;
use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\BusRegOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\CasesOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\LicenceOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\SurrenderOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\TransportManagerOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrhpApplicationOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/document/upload")
 * @Transfer\Method("POST")
 */
final class Upload extends AbstractCommand implements LoggerOmitContentInterface
{
    use ApplicationOptional,
        BusRegOptional,
        CasesOptional,
        TransportManagerOptional,
        LicenceOptional,
        SurrenderOptional,
        IrhpApplicationOptional;

    /**
     * @Transfer\Filter({
     *     "name":"Zend\Filter\PregReplace",
     *     "options": {"pattern": "/[^a-zA-Z0-9\-\_\.]+/", "replacement": ""}
     * })
     */
    protected $filename;

    protected $content;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $irfoOrganisation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $submission;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $trafficArea;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $operatingCentre;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $opposition;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $continuationDetail;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $category;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $subCategory;

    /**
     * @Transfer\Filter({
     *     "name":"Zend\Filter\PregReplace",
     *     "options": {"pattern": "/[^a-zA-Z0-9\-\_\.]+/", "replacement": ""}
     * })
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":2, "max":255}})
     * @Transfer\Optional
     */
    protected $description;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $isExternal;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $isScan = 0;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $isEbsrPack = 0;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\DateTimeFormatter"})
     * @Transfer\Optional
     */
    protected $issuedDate;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     * @Transfer\Optional
     */
    protected $user;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $shouldUploadOnly = false;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $additionalCopy;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "application",
     *              "licence",
     *              "transportManager",
     *              "surrender",
     *              "case",
     *              "busReg",
     *              "irhpApplication"
     *          }
     *      }
     *  }
     * )
     * @Transfer\Optional
     */
    protected $additionalEntities = [];

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $isPostSubmissionUpload = 0;

    /**
     * Get filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get irfo organisation
     *
     * @return int
     */
    public function getIrfoOrganisation()
    {
        return $this->irfoOrganisation;
    }

    /**
     * Get submission
     *
     * @return int
     */
    public function getSubmission()
    {
        return $this->submission;
    }

    /**
     * Get traffic area
     *
     * @return string
     */
    public function getTrafficArea()
    {
        return $this->trafficArea;
    }

    /**
     * Get operating centre
     *
     * @return int
     */
    public function getOperatingCentre()
    {
        return $this->operatingCentre;
    }

    /**
     * Get opposition
     *
     * @return int
     */
    public function getOpposition()
    {
        return $this->opposition;
    }

    /**
     * Get category
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get sub category
     *
     * @return int
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get is external
     *
     * @return bool
     */
    public function getIsExternal()
    {
        return $this->isExternal;
    }

    /**
     * Get is scan
     *
     * @return bool
     */
    public function getIsScan()
    {
        return $this->isScan;
    }

    /**
     * Get is ebsr pack
     *
     * @return bool
     */
    public function getIsEbsrPack()
    {
        return $this->isEbsrPack;
    }

    /**
     * Get issued date
     *
     * @return string
     */
    public function getIssuedDate()
    {
        return $this->issuedDate;
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get should upload only
     *
     * @return bool
     */
    public function getShouldUploadOnly()
    {
        return $this->shouldUploadOnly;
    }

    /**
     * Get additional copy
     *
     * @return bool
     */
    public function getAdditionalCopy()
    {
        return $this->additionalCopy;
    }

    /**
     * Get additional entities
     *
     * @return array
     */
    public function getAdditionalEntities()
    {
        return $this->additionalEntities;
    }

    /**
     * @return int
     */
    public function getContinuationDetail()
    {
        return $this->continuationDetail;
    }

    public function getIsPostSubmissionUpload()
    {
        return $this->isPostSubmissionUpload;
    }
}
