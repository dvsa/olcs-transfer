<?php

namespace Dvsa\Olcs\Transfer\Command\Surrender;

use Dvsa\Olcs\Transfer\FieldType\Traits;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/licence/single/surrender")
 * @Transfer\Method("PUT")
 */
class Update extends AbstractCommand
{

    use Traits\Identity,
        Traits\Version;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\LicenceDocumentStatus"})
     * @Transfer\Optional
     */
    protected $communityLicenceDocumentStatus;

    /**
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $digitalSignature;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $discDestroyed;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $discLost;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     * @Transfer\Optional
     */
    protected $discLostInfo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0, "inclusive": true}})
     * @Transfer\Optional
     */
    protected $discStolen;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     * @Transfer\Optional
     */
    protected $discStolenInfo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\LicenceDocumentStatus"})
     * @Transfer\Optional
     */
    protected $licenceDocumentStatus;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\SurrenderStatus"})
     * @Transfer\Optional
     */
    protected $status;


    /**
     * @return mixed
     */
    public function getCommunityLicenceDocumentStatus()
    {
        return $this->communityLicenceDocumentStatus;
    }

    /**
     * @return mixed
     */
    public function getDigitalSignature()
    {
        return $this->digitalSignature;
    }

    /**
     * @return mixed
     */
    public function getDiscDestroyed()
    {
        return $this->discDestroyed;
    }

    /**
     * @return mixed
     */
    public function getDiscLost()
    {
        return $this->discLost;
    }

    /**
     * @return mixed
     */
    public function getDiscLostInfo()
    {
        return $this->discLostInfo;
    }

    /**
     * @return mixed
     */
    public function getDiscStolen()
    {
        return $this->discStolen;
    }

    /**
     * @return mixed
     */
    public function getDiscStolenInfo()
    {
        return $this->discStolenInfo;
    }

    /**
     * @return mixed
     */
    public function getLicenceDocumentStatus()
    {
        return $this->licenceDocumentStatus;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
}
