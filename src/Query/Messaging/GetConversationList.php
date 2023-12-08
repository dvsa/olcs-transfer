<?php

namespace Dvsa\Olcs\Transfer\Query\Messaging;

use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\LicenceOptional;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/messaging/conversations")
 */
final class GetConversationList extends AbstractQuery implements PagedQueryInterface
{
    use PagedTrait;
    use LicenceOptional;
    use ApplicationOptional;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     */
    protected $applyNewMessageSorting = true;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\Boolean"})
     */
    protected $applyOpenMessageSorting = true;

    public function getApplyNewMessageSorting(): bool
    {
        return $this->applyNewMessageSorting;
    }

    public function setApplyNewMessageSorting($value)
    {
        $this->applyOpenMessageSorting = (bool) $value;
    }

    public function getApplyOpenMessageSorting(): bool
    {
        return $this->applyOpenMessageSorting;
    }

    public function setApplyOpenMessageSorting($value)
    {
        $this->applyOpenMessageSorting = (bool) $value;
    }
}
