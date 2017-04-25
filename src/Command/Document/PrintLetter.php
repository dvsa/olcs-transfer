<?php

namespace Dvsa\Olcs\Transfer\Command\Document;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/document/single/letter/print")
 * @Transfer\Method("POST")
 */
final class PrintLetter extends AbstractCommand
{
    const METHOD_EMAIL = 'email';
    const METHOD_PRINT_AND_POST = 'printAndPost';

    use Identity;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              PrintLetter::METHOD_EMAIL,
     *              PrintLetter::METHOD_PRINT_AND_POST,
     *          },
     *     },
     * })
     * @Transfer\Optional
     */
    protected $method;

    /**
     * Get Method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }
}
