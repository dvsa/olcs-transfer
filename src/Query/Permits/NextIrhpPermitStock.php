<?php

/**
 * window
 */
namespace Dvsa\Olcs\Transfer\Query\Permits;

use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;

/**
 * @Transfer\RouteName("backend/permits/next-stock")
 */
class NextIrhpPermitStock extends AbstractQuery implements CachableShortTermQueryInterface
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $permitType = null;

    /**
    * @Transfer\Optional
    * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
    */
    protected $date = null;

    /**
     * @return string
     */
    public function getPermitType()
    {
        return $this->permitType;
    }

    /**
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }
}
