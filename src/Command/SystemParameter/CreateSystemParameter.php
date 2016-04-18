<?php

/**
 * Create System Parameter
 */
namespace Dvsa\Olcs\Transfer\Command\SystemParameter;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/system-parameter")
 * @Transfer\Method("POST")
 */
final class CreateSystemParameter extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":32}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":32}})
     */
    protected $paramValue;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":255}})
     * @Transfer\Optional
     */
    protected $description;

    public function getId()
    {
        return $this->id;
    }

    public function getParamValue()
    {
        return $this->paramValue;
    }

    public function getDescription()
    {
        return $this->description;
    }
}