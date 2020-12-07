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
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"\Dvsa\Olcs\Transfer\Validators\Xml", "options":{"usePluginManager":true}})
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
