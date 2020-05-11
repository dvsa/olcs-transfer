<?php

/**
 * Update User Last Login At
 */
namespace Dvsa\Olcs\Transfer\Command\User;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;

/**
 * @Transfer\RouteName("backend/user/login/single")
 * @Transfer\Method("PUT")
 */
final class UpdateUserLastLoginAt extends AbstractCommand
{
    use Identity;
    use Version;
}
