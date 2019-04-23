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
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 0, "max": 500}})
     * @Transfer\Optional
     */
    protected $communityLicenceDocumentInfo;

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
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 0, "max": 500}})
     * @Transfer\Optional
     */
    protected $licenceDocumentInfo;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\SurrenderStatus"})
     * @Transfer\Optional
     */
    protected $status;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min": 1}})
     * @Transfer\Validator({
     *     "name":"Zend\Validator\InArray",
     *     "options": {
     *         "haystack": {"sig_physical_signature","sig_digital_signature","sig_signature_not_required"}
     *     }
     * })
     * @Transfer\Optional
     */
    protected $signatureType;

    /**
     * @Transfer\Filter({"name":"Dvsa\Olcs\Transfer\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $signatureChecked;

    /**
     * @Transfer\Filter({"name":"Dvsa\Olcs\Transfer\Filter\Boolean"})
     * @Transfer\Optional
     */
    protected $ecmsChecked;

    /**
     * @return mixed
     */
    public function getSignatureChecked()
    {
        return $this->signatureChecked;
    }

    /**
     * @return mixed
     */
    public function getEcmsChecked()
    {
        return $this->ecmsChecked;
    }

    public function getCommunityLicenceDocumentStatus()
    {
        return $this->communityLicenceDocumentStatus;
    }

    public function getDigitalSignature()
    {
        return $this->digitalSignature;
    }

    public function getDiscDestroyed()
    {
        return $this->discDestroyed;
    }

    public function getDiscLost()
    {
        return $this->discLost;
    }

    public function getDiscLostInfo()
    {
        return $this->discLostInfo;
    }

    public function getDiscStolen()
    {
        return $this->discStolen;
    }

    public function getDiscStolenInfo()
    {
        return $this->discStolenInfo;
    }

    public function getLicenceDocumentStatus()
    {
        return $this->licenceDocumentStatus;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getSignatureType()
    {
        return $this->signatureType;
    }

    /**
     * @return mixed
     */
    public function getCommunityLicenceDocumentInfo()
    {
        return $this->communityLicenceDocumentInfo;
    }

    /**
     * @return mixed
     */
    public function getLicenceDocumentInfo()
    {
        return $this->licenceDocumentInfo;
    }
}
