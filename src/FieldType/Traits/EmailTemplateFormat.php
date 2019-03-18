<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Email template format trait
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
trait EmailTemplateFormat
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "plain", "html"
     *          }
     *      }
     * })
     */
    protected $format;

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }
}
