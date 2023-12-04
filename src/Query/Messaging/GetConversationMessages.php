<?php

namespace Dvsa\Olcs\Transfer\Query\Messaging;

use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/messaging/messaging")
 */
final class GetConversationMessages extends AbstractQuery implements PagedQueryInterface
{
    use PagedTrait;
}
