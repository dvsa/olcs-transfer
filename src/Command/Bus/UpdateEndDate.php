<?php

declare (strict_types = 1);

namespace Dvsa\Olcs\Transfer\Command\Bus;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldType;

/**
 * @Transfer\RouteName("backend/bus/single/end-date")
 * @Transfer\Method("PUT")
 */
final class UpdateEndDate extends AbstractCommand
{
    use FieldType\Identity;
    use FieldType\Version;

    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    public $endDate;

    /**
     * Get end date
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
