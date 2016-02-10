<?php

/**
 * Create Printer
 */
namespace Dvsa\Olcs\Transfer\Command\Printer;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/printer")
 * @Transfer\Method("POST")
 */
final class CreatePrinter extends AbstractCommand
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":45}})
     */
    protected $printerName;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":45}})
     * @Transfer\Optional
     */
    protected $printerTray;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"min":1, "max":255}})
     * @Transfer\Optional
     */
    protected $description;

    public function getPrinterName()
    {
        return $this->printerName;
    }

    public function getPrinterTray()
    {
        return $this->printerTray;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
