<?php

/**
 * Revoke Licence
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType;

/**
 * @Transfer\RouteName("backend/licence/single/decisions/revoke")
 * @Transfer\Method("POST")
 */
final class RevokeLicence extends AbstractCommand
{
    use FieldType\Traits\ReasonsOptional;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     */
    protected $deleteLicenceStatusRules = true;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return bool
     */

    public function getDeleteLicenceStatusRules()
    {
        return $this->deleteLicenceStatusRules;
    }
}
