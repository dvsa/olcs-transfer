<?php

namespace Dvsa\Olcs\Transfer\Query\Document;

use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\BusRegOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\CasesOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\LicenceOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\TransportManagerOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\IrfoOrganisationOptional;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/document")
 */
class DocumentList extends AbstractQuery implements OrderedQueryInterface, PagedQueryInterface
{
    use OrderedTrait,
        PagedTrait,
        ApplicationOptional,
        LicenceOptional,
        CasesOptional,
        BusRegOptional,
        TransportManagerOptional,
        IrfoOrganisationOptional;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $isExternal;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $category;

    /**
     * @Transfer\Optional
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $documentSubCategory = [];

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {"tsw_all", "tsw_self_only"}
     *     }
     * })
     */
    protected $showDocs = null;

    /**
     * Is External
     *
     * @return string
     */
    public function getIsExternal()
    {
        return $this->isExternal;
    }

    /**
     * Get Category
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get Document Sub Category
     *
     * @return array
     */
    public function getDocumentSubCategory()
    {
        return $this->documentSubCategory;
    }

    /**
     * Get Show Docuements
     *
     * @return string
     */
    public function getShowDocs()
    {
        return $this->showDocs;
    }
}
