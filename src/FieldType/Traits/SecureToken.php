<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Identity
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
