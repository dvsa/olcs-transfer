<?php declare(strict_types=1);


namespace Dvsa\Olcs\Transfer\Query\CompaniesHouse;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableShortTermQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class GetList
 * @Transfer\RouteName("backend/companies-house/number")
 */

class ByNumber extends AbstractQuery implements CachableShortTermQueryInterface
{
    /**
     * @Transfer\Required()
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $companyNumber;

    /**
     * @return mixed
     */
    public function getCompanyNumber()
    {
        return $this->companyNumber;
    }

    /**
     * @param mixed $companyNumber
     */
    public function setCompanyNumber($companyNumber): void
    {
        $this->companyNumber = $companyNumber;
    }
}