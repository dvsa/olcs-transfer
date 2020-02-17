<?php

namespace Dvsa\Olcs\Transfer\Command\Document;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\Ids;

/**
 * @Transfer\RouteName("backend/document/letter/print")
 * @Transfer\Method("POST")
 */
class PrintLetters extends AbstractCommand
{
    const METHOD_EMAIL = 'email';
    const METHOD_PRINT_AND_POST = 'printAndPost';

    use Ids;

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
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }
}