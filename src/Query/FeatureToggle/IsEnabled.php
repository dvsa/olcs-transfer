<?php

/**
 * Get a single feature toggle by id
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\FeatureToggle;

use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/feature-toggle/check")
 */
class IsEnabled extends AbstractQuery implements CachableMediumTermQueryInterface
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     */
    protected $ids = [];

    public function getIds(): array
    {
        return $this->ids;
    }
}
