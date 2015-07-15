<?php

/**
 * UpdateVehicleDeclaration
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/application/single/vehicle-declaration")
 * @Transfer\Method("PUT")
 */
final class UpdateVehicleDeclaration extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $id;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $version;

    // Small vehicles

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $psvNoSmallVhlConfirmation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $psvOperateSmallVhl;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $psvSmallVhlConfirmation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $psvSmallVhlNotes;

    // Medium vehicles

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $psvMediumVhlConfirmation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Optional
     */
    protected $psvMediumVhlNotes;

    // Limos

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $psvLimousines;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     */
    protected $psvNoLimousineConfirmation;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\InArray", "options": {"haystack": {"Y", "N"}}})
     * @Transfer\Optional
     */
    protected $psvOnlyLimousinesConfirmation;

    public function getId()
    {
        return $this->id;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getPsvNoSmallVhlConfirmation()
    {
        return $this->psvNoSmallVhlConfirmation;
    }

    public function getPsvOperateSmallVhl()
    {
        return $this->psvOperateSmallVhl;
    }

    public function getPsvSmallVhlConfirmation()
    {
        return $this->psvSmallVhlConfirmation;
    }

    public function getPsvSmallVhlNotes()
    {
        return $this->psvSmallVhlNotes;
    }

    public function getPsvMediumVhlConfirmation()
    {
        return $this->psvMediumVhlConfirmation;
    }

    public function getPsvMediumVhlNotes()
    {
        return $this->psvMediumVhlNotes;
    }

    public function getPsvLimousines()
    {
        return $this->psvLimousines;
    }

    public function getPsvNoLimousineConfirmation()
    {
        return $this->psvNoLimousineConfirmation;
    }

    public function getPsvOnlyLimousinesConfirmation()
    {
        return $this->psvOnlyLimousinesConfirmation;
    }
}
