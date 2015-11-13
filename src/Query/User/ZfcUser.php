<?php

/**
 * User
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\User;

use Dvsa\Olcs\Transfer\FieldType\Traits\IdentityOptional;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableQueryInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * NOTE This is a temporary query dto used to bridge the gap between zfcuser and openam
 *
 * @Transfer\RouteName("backend/zfcuser")
 */
class ZfcUser extends AbstractQuery implements CachableQueryInterface
{
    use IdentityOptional;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options": {"max": 40}})
     */
    protected $username;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}
