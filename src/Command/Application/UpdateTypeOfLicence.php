<?php

/**
 * Type Of Licence
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/type-of-licence")
 * @Transfer\Method("PUT")
 */
final class UpdateTypeOfLicence extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"lcat_gv","lcat_psv"}}})
     * @Transfer\Optional
     */
    protected $operatorType;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Laminas\Validator\InArray",
     *     "options": {"haystack": {"ltyp_r","ltyp_sn","ltyp_si","ltyp_sr"}}
     * })
     */
    protected $licenceType;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $niFlag;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $confirm = false;

    public function getId()
    {
        return $this->id;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getOperatorType()
    {
        return $this->operatorType;
    }

    public function getLicenceType()
    {
        return $this->licenceType;
    }

    public function getNiFlag()
    {
        return $this->niFlag;
    }

    public function getConfirm()
    {
        return $this->confirm;
    }
}
