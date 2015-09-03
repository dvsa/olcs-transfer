<?php

/**
 * Print Letter
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Document;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/document/single/letter/print")
 * @Transfer\Method("POST")
 */
final class PrintLetter extends AbstractCommand
{
    use Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $shouldEmail;

    /**
     * @return mixed
     */
    public function getShouldEmail()
    {
        return $this->shouldEmail;
    }
}
