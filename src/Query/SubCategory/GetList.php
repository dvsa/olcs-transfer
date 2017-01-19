<?php

namespace Dvsa\Olcs\Transfer\Query\SubCategory;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;

/**
 * @Transfer\RouteName("backend/subcategory")
 */
class GetList extends AbstractQuery implements
    \Dvsa\Olcs\Transfer\Query\OrderedQueryInterface,
    CachableMediumTermQueryInterface
{
    use \Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;

    /**
     * @var string
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $isTaskCategory;

    /**
     * @var string
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $isDocCategory;

    /**
     * @var string
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $isScanCategory;

    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     */
    protected $category;

    /**
     * @var string
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $isOnlyWithItems;

    /**
     * Get Is Task Category
     *
     * @return string
     */
    public function getIsTaskCategory()
    {
        return $this->isTaskCategory;
    }

    /**
     * Get Is Doc Category
     *
     * @return string
     */
    public function getIsDocCategory()
    {
        return $this->isDocCategory;
    }

    /**
     * Get is Scan Category
     *
     * @return string
     */
    public function getIsScanCategory()
    {
        return $this->isScanCategory;
    }

    /**
     * Get Category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Is Take only categories with Items
     *
     * @return string
     */
    public function getIsOnlyWithItems()
    {
        return $this->isOnlyWithItems;
    }
}
