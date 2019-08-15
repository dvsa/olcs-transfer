<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait TemplateFolder
 *
 * @package Dvsa\Olcs\Transfer\Command\Fieldtype\Trait
 * @author Andy Newton <andy@vitri.ltd>
 */
trait TemplateFolder
{
    /**
     * @var String
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "root",
     *              "gb",
     *              "ni",
     *              "image",
     *              "guides"
     *          }
     *      }
     * })
     */
    protected $templateFolder;

    /**
     * @return string
     */
    public function getTemplateFolder()
    {
        return $this->templateFolder;
    }
}
