<?php

namespace Dvsa\Olcs\Transfer\Query\CompaniesHouse;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Class GetList
 * @Transfer\RouteName("backend/companies-house")
 */
class GetList extends AbstractQuery
{
    /**
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "nameSearch",
     *              "numberSearch",
     *              "companyDetails",
     *              "currentCompanyOfficers"
     *          }
     *      }
     * })
     */
    protected $type;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $value;

    /**
     * Gets the value of type
     *
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Gets the value of value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
