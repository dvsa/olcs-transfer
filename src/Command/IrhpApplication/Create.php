<?php

/**
 * Create Irhp Application
 */
namespace Dvsa\Olcs\Transfer\Command\IrhpApplication;

use Dvsa\Olcs\Transfer\FieldType\Traits\Licence;
use Dvsa\Olcs\Transfer\FieldType\Traits\YearOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/irhp-application")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    use Licence;
    use YearOptional;

    /**
     * @var string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\Between",
     *      "options": {
     *          "min": 0,
     *          "max": 999999
     *      }
     * })
     */
    protected $type;

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }
}
