<?php

/**
 * Create Irhp Permit Application
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpPermitApplication;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irhp-permit-application")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $type;

    /**
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $licence;

    public function getType()
    {
        return $this->type;
    }

    public function getLicence()
    {
        return $this->licence;
    }
}
