<?php declare(strict_types=1);


namespace Dvsa\Olcs\Transfer\Query\CompaniesHouse;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class ByNumber
 * @Transfer\RouteName("backend/companies-house/number")
 */

class ByNumber extends AbstractQuery implements CachableShortTermQueryInterface
{
    /**
     * /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength","options":{"min":8,"max":8}})
     */
    protected $companyNumber;

    /**
     * @return mixed
     */
    public function getCompanyNumber()
    {
        return $this->companyNumber;
    }
}
