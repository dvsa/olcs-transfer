<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait Username
{
    /**
     * @var String
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"max":255}})
     */
    protected $username = null;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
}
