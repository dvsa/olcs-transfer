<?php

/**
 * Command Dto Stub
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\OlcsTest\Transfer\Util\Stub;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("test/route")
 * @Transfer\Method("POST")
 */
class CommandDtoStub extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\ArrayInput
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\FilterEmptyItems"})
     * @Transfer\ArrayFilter({"name":"Dvsa\Olcs\Transfer\Filter\UniqueItems"})
     * @Transfer\ArrayValidator({"name":"Laminas\Validator\NotEmpty", "options": {"type":"array"}})
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     */
    protected $list = [];

    /**
     * @Transfer\Partial("Dvsa\OlcsTest\Transfer\Util\Stub\PartialStub")
     */
    protected $structured;

    /**
     * @Transfer\Optional
     */
    protected $imOptional;

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
    public function getList()
    {
        return $this->list;
    }

    /**
     * @return mixed
     */
    public function getStructured()
    {
        return $this->structured;
    }

    /**
     * @return mixed
     */
    public function getImOptional()
    {
        return $this->imOptional;
    }
}
