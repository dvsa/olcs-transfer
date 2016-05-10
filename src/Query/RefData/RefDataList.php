<?php

/**
 * Get a list of RefData
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\RefData;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;

/**
 * @Transfer\RouteName("backend/ref-data")
 */
class RefDataList extends AbstractQuery implements CachableMediumTermQueryInterface
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToLower"})
     */
    protected $refDataCategory;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToLower"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray","options":{"haystack": {"en", "cy"}}})
     */
    protected $language;

    public function getRefDataCategory()
    {
        return $this->refDataCategory;
    }

    public function getLanguage()
    {
        return $this->language;
    }
}
