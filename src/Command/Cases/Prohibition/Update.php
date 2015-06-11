<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Prohibition;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\FieldType as FieldType;

/**
 * @Transfer\RouteName("backend/prohibition/single")
 * @Transfer\Method("PUT")
 */
class Update extends AbstractCommand
    implements
    FieldType\IdentityInterface,
    FieldType\VersionInterface,
    FieldType\CasesInterface
{
    // Identity & Locking
    use FieldType\Traits\Identity;
    use FieldType\Traits\Version;

    // Foreign Keys
    use FieldType\Traits\Cases;
    use FieldType\Traits\ProhibitionType;

    // Fields
    use FieldType\Traits\Vrm;

    /**
     * @var int
     *
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    public $prohibitionDate = null;

    /**
     * @var String
     *
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *          "haystack": {
     *              "Y",
     *              "N"
     *          }
     *      }
     * })
     */
    public $isTrailer = null;

    /**
     * @var string
     *
     * @Transfer\Validator({"name": "Date", "options": {"format": "Y-m-d"}})
     */
    public $clearedDate = null;

    /**
     * @var string
     *
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":255}})
     */
    public $imposedAt = null;

    /**
     * @return mixed
     */
    public function getProhibitionDate()
    {
        return $this->prohibitionDate;
    }

    /**
     * @return mixed
     */
    public function getIsTrailer()
    {
        return $this->isTrailer;
    }

    /**
     * @return mixed
     */
    public function getClearedDate()
    {
        return $this->clearedDate;
    }

    /**
     * @return mixed
     */
    public function getImposedAt()
    {
        return $this->imposedAt;
    }
}
