<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Xml
 */
trait Xml
{
    /**
     * @var string
     * @Transfer\Escape(false)
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Xml"})
     */
    public $xml;

    /**
     * @return string
     */
    public function getXml()
    {
        return $this->xml;
    }
}
