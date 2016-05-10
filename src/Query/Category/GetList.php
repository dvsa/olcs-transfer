<?php

/**
 * Get a list of Category's
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Category;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\CachableMediumTermQueryInterface;

/**
 * @Transfer\RouteName("backend/category")
 */
class GetList extends AbstractQuery implements
    \Dvsa\Olcs\Transfer\Query\OrderedQueryInterface,
    CachableMediumTermQueryInterface
{
    use \Dvsa\Olcs\Transfer\Query\OrderedTrait;

    /**
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $isTaskCategory;

    /**
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $isDocCategory;

    /**
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $isScanCategory;

    public function getIsTaskCategory()
    {
        return $this->isTaskCategory;
    }

    public function getIsDocCategory()
    {
        return $this->isDocCategory;
    }

    public function getIsScanCategory()
    {
        return $this->isScanCategory;
    }
}
