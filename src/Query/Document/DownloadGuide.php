<?php

namespace Dvsa\Olcs\Transfer\Query\Document;

use Dvsa\Olcs\Transfer\Query\LoggerOmitResponseInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/document/download-guide")
 */
class DownloadGuide extends AbstractQuery implements LoggerOmitResponseInterface
{
    protected $identifier;

    /**
     * Get identifier, Eg filename
     *
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }
}
