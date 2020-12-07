<?php

/**
 * NotTakenUpApplication.php
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/not-taken-up")
 * @Transfer\Method("PUT")
 */
final class NotTakenUpApplication extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
