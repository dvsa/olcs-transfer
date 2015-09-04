<?php

/**
 * Merge Transport Manager
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Tm;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;

/**
 * @Transfer\RouteName("backend/transport-manager/single/merge")
 * @Transfer\Method("PUT")
 */
final class Merge extends AbstractCommand
{
    use Identity;

    /**
     * @var int
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $recipientTransportManager;

    /**
     * @return int
     */
    public function getRecipientTransportManager()
    {
        return $this->recipientTransportManager;
    }
}
