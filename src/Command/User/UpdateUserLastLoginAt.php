<?php

namespace Dvsa\Olcs\Transfer\Command\User;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\SecureToken;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/user/login/update-last-login")
 * @Transfer\Method("POST")
 */
final class UpdateUserLastLoginAt extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\Username"})
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    use SecureToken;
}
