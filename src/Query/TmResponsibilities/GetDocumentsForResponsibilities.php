<?php

/**
 * Get Documents for TM Responsibilites
 *
 * @author Alex Peshkov <alex.peshkov@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\TmResponsibilities;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/tm-responsibilities/documents")
 */
class GetDocumentsForResponsibilities extends AbstractQuery
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $transportManager;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licOrAppId;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"application", "licence"}}})
     * @Transfer\Optional
     */
    protected $type;

    /**
     * @return mixed
     */
    public function getTransportManager()
    {
        return $this->transportManager;
    }

    /**
     * @return mixed
     */
    public function getLicOrAppId()
    {
        return $this->licOrAppId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}
