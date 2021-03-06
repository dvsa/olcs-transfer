<?php

/**
 * Create Team
 */
namespace Dvsa\Olcs\Transfer\Command\Team;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\TrafficAreaOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\FieldType\Traits\Version;

/**
 * @Transfer\RouteName("backend/team/single")
 * @Transfer\Method("PUT")
 */
final class UpdateTeam extends AbstractCommand
{
    use TrafficAreaOptional,
        Identity,
        Version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":1, "max":70}})
     */
    protected $name;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":1, "max":255}})
     */
    protected $description;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $defaultPrinter;

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getDefaultPrinter()
    {
        return $this->defaultPrinter;
    }
}
