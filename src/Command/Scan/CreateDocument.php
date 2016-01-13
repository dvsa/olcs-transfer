<?php

/**
 * CreateDocument - used by the olcs-scanning service to add scanned documents
 */
namespace Dvsa\Olcs\Transfer\Command\Scan;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/scan/create-document")
 * @Transfer\Method("POST")
 */
final class CreateDocument extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $scanId;

    protected $content;

    protected $filename;

    /**
     * @return int
     */
    public function getScanId()
    {
        return $this->scanId;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }
}
