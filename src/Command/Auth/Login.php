<?php

namespace Dvsa\Olcs\Transfer\Command\Auth;

use Dvsa\Olcs\Transfer\FieldType\Traits\Username;
use Dvsa\Olcs\Transfer\FieldType\Traits\Password;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/auth/login")
 * @Transfer\Method("POST")
 */
final class Login extends AbstractCommand
{
    use Username;
    use Password;

    /**
     * @var String
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator(
     *  {
     *      "name":"Laminas\Validator\InArray",
     *      "options": {"haystack": {"selfserve","internal"}}
     *  }
     * )
     */
    protected $realm = null;

    /**
     * @return int
     */
    public function getRealm()
    {
        return $this->realm;
    }
}
