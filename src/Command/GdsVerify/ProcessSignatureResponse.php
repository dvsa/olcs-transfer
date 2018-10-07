<?php

namespace Dvsa\Olcs\Transfer\Command\GdsVerify;

use Dvsa\Olcs\Transfer\FieldType\Traits\ApplicationOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\TransportManagerApplicationOperatorSignatureOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\TransportManagerApplicationOptional;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/gds-verify/process-response")
 * @Transfer\Method("POST")
 */
class ProcessSignatureResponse extends AbstractCommand
{
    use ApplicationOptional,
        TransportManagerApplicationOptional,
        TransportManagerApplicationOperatorSignatureOptional;


    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $samlResponse;

    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $continuationDetail;

    /**
     * @return int
     */
    public function getContinuationDetail()
    {
        return $this->continuationDetail;
    }

    /**
     * @param int $continuationDetailId ContinuationDetail ID
     * @return void
     */
    public function setContinuationDetail($continuationDetailId)
    {
        $this->continuationDetail = (int) $continuationDetailId;
    }

    /**
     * @return string
     */
    public function getSamlResponse()
    {
        return $this->samlResponse;
    }
}
