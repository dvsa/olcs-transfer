<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * SecureToken
 */
trait SecureToken
{
    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $secureToken;

    /**
     * @return string
     */
    public function getSecureToken()
    {
        return $this->secureToken;
    }
}
