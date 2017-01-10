<?php

/**
 * StoredCardList
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Cpms;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/cpms/stored-card-list")
 */
class StoredCardList extends AbstractQuery
{
    /**
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     */
    protected $isNi;

    /**
     * Get isNi
     * @return string
     */
    public function getIsNi()
    {
        return $this->isNi;
    }
}
