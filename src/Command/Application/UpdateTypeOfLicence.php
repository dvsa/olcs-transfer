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
 * @src\RouteName("backend/application/single/type-of-licence")
 * @src\Method("PUT")
 */
final class UpdateTypeOfLicence extends AbstractCommand
{
    /**
     * @src\Filter({"name":"Zend\Filter\Digits"})
     * @src\Validator({"name":"Zend\Validator\Digits"})
     * @src\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @src\Filter({"name":"Zend\Filter\Digits"})
     * @src\Validator({"name":"Zend\Validator\Digits"})
     * @src\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @src\Filter({"name":"Zend\Filter\StringTrim"})
     * @src\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"lcat_gv","lcat_psv"}}})
     */
    protected $operatorType;

    /**
     * @src\Filter({"name":"Zend\Filter\StringTrim"})
     * @src\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"ltyp_r","ltyp_sn","ltyp_si","ltyp_sr"}}})
     */
    protected $licenceType;

    /**
     * @src\Filter({"name":"Zend\Filter\StringTrim"})
     * @src\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $niFlag;

    /**
     * @src\Filter({"name":"Zend\Filter\Boolean"})
     * @src\Optional
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
