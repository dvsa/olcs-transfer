<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Email template name trait
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
trait EmailTemplateName
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $template;

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
}
