<?php

namespace Dvsa\Olcs\Transfer\Command\Letter\LetterAppendix;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/letter/letter-appendix")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    /**
     * @var string
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength", options={"min":1, "max":100})
     */
    protected $appendixKey;
    /**
     * @var string
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\StringLength", options={"min":1, "max":255})
     */
    protected $name;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     */
    protected $description;

    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\Digits")
     * @Transfer\Validator("Laminas\Validator\Digits")
     * @Transfer\Validator("Laminas\Validator\GreaterThan", options={"min": 0})
     */
    protected $document;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter("Laminas\Filter\DateTimeFormatter")
     * @Transfer\Validator("Laminas\Validator\Date", options={"format": "Y-m-d H:i:s"})
     */
    protected $publishFrom;

    /**
     * @return string
     */
    public function getAppendixKey()
    {
        return $this->appendixKey;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @return string
     */
    public function getPublishFrom()
    {
        return $this->publishFrom;
    }
}