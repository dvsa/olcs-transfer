<?php

/**
 * Create Team Printer
 */
namespace Dvsa\Olcs\Transfer\Command\TeamPrinter;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits\SubCategoryOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\UserOptional;

/**
 * @Transfer\RouteName("backend/printer-exception")
 * @Transfer\Method("POST")
 */
final class CreateTeamPrinter extends AbstractCommand
{
    use SubCategoryOptional,
        UserOptional;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $team;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $printer;

    public function getTeam()
    {
        return $this->team;
    }

    public function getPrinter()
    {
        return $this->printer;
    }
}
