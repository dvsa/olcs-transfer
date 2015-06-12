<?php

/**
 * Update Fee
 *
 * @author Dan Eggleston <dan@stolenegg.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Fee;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType;
use Dvsa\Olcs\Transfer\FieldType\Traits as FieldTypeTraits;

/**
 * @Transfer\RouteName("backend/fee/single")
 * @Transfer\Method("PUT")
 */
final class UpdateFee extends AbstractCommand
    implements
    FieldType\IdentityInterface,
    FieldType\VersionInterface
{
    use FieldTypeTraits\Identity;
    use FieldTypeTraits\Version;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name": "Zend\Filter\StringTrim"})
     */
    protected $waiveReason;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *  "name":"Zend\Validator\InArray",
     *  "options": {"haystack": {"lfs_wr","lfs_w","lfs_ot"}}
     * })
     */
    protected $status;

    /**
     * @return string
     */
    public function getWaiveReason()
    {
        return $this->waiveReason;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
