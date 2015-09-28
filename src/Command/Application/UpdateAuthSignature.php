<?php

/**
 * UpdateAuthSignature
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\FieldType\Traits\Version;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
* @Transfer\RouteName("backend/application/single/auth-signature")
* @Transfer\Method("PUT")
*/
class UpdateAuthSignature extends AbstractCommand
{
    use Identity,
        Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     */
    protected $authSignature;

    public function getAuthSignature()
    {
        return $this->authSignature;
    }
}
