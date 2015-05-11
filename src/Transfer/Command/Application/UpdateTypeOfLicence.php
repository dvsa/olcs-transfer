<?php

/**
 * Type Of Licence
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * @Transfer\RouteName("backend/application/type-of-licence")
 * @Transfer\Method("PUT")
 */
class UpdateTypeOfLicence implements ArraySerializableInterface
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"lcat_gv","lcat_psv"}}})
     */
    protected $operatorType;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"ltyp_r","ltyp_sn","ltyp_si","ltyp_sr"}}})
     */
    protected $licenceType;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $niFlag;

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

    /**
     * Exchange internal values from provided array
     *
     * @param array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        if (isset($array['id'])) {
            $this->id = $array['id'];
        }

        if (isset($array['version'])) {
            $this->version = $array['version'];
        }

        if (isset($array['operatorType'])) {
            $this->operatorType = $array['operatorType'];
        }

        if (isset($array['licenceType'])) {
            $this->licenceType = $array['licenceType'];
        }

        if (isset($array['niFlag'])) {
            $this->niFlag = $array['niFlag'];
        }
    }

    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id' => $this->id,
            'version' => $this->version,
            'operatorType' => $this->operatorType,
            'licenceType' => $this->licenceType,
            'niFlag' => $this->niFlag
        ];
    }
}
