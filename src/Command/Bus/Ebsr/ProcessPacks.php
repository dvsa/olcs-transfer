<?php

namespace Dvsa\Olcs\Transfer\Command\Bus\Ebsr;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Process Ebsr packs
 *
 * @Transfer\RouteName("backend/bus/single/process-packs")
 * @Transfer\Method("POST")
 */
class ProcessPacks extends AbstractCommand
{
    /**
     * @Transfer\ArrayInput
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     */
    protected $packs;

    /**
     * @var string
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"ebsrt_new","ebsrt_refresh"}}})
     */
    protected $submissionType;

    /**
     * @return array
     */
    public function getPacks()
    {
        return $this->packs;
    }

    /**
     * @return string
     */
    public function getSubmissionType()
    {
        return $this->submissionType;
    }
}
