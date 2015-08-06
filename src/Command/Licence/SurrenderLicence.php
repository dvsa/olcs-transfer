<?php

/**
 * SurrenderLicence.php
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/decisions/surrender")
 * @Transfer\Method("POST")
 */
final class SurrenderLicence extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @var \DateTime
     * @Transfer\Validator({"name":"Zend\Validator\Date", "options": {"format": "Y-m-d"}})
     */
    protected $surrenderDate;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Zend\Filter\Boolean"})
     */
    protected $terminated = false;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSurrenderDate()
    {
        return $this->surrenderDate;
    }

    /**
     * @return boolean
     */
    public function isTerminated()
    {
        return $this->terminated;
    }
}
