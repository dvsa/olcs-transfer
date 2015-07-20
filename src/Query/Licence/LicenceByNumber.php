<?php

/**
 * LicenceByNumber.php
 *
 * @author Josh Curtis <josh.curtis@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/licence/by-number")
 */
class LicenceByNumber extends AbstractQuery
{
    protected $licenceNumber;

    /**
     * @return mixed
     */
    public function getLicenceNumber()
    {
        return $this->licenceNumber;
    }
}
