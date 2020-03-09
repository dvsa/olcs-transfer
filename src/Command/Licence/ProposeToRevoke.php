<?php

namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/propose-to-revoke")
 * @Transfer\Method("POST")
 */
class ProposeToRevoke extends AbstractCommand
{
    use Licence;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $document;

    /**
     * @return mixed
     */
    public function getDocument()
    {
        return $this->document;
    }
}
