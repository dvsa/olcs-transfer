<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Identity String
 * @author Andy Newton <andy@vitri.ltd>
 */
trait IdentityString
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"max":512}})
     */
    protected $id;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
