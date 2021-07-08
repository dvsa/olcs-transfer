<?php

declare(strict_types = 1);

namespace Dvsa\Olcs\Transfer\Command\Bus;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/bus/notice-period-create")
 * @Transfer\Method("POST")
 */
final class CreateNoticePeriod extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"max":70}})
     */
    public $noticeArea;

    /**
     * @var int
     * @Transfer\Filter({"name":"Laminas\Filter\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Digits"})
     * @Transfer\Validator({"name":"Laminas\Validator\Between", "options": {"min":0, "max":999}})
     */
    public $standardPeriod;

    public function getNoticeArea(): string
    {
        return $this->noticeArea;
    }

    public function getStandardPeriod(): int
    {
        return (int)$this->standardPeriod;
    }
}
