<?php

/**
 * Update User Last Login At
 */
namespace Dvsa\Olcs\Transfer\Command\User;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/user/login/single")
 * @Transfer\Method("PUT")
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
}
