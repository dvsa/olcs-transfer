<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait ReportType
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 *
 */
trait ReportType
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Zend\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "rep_typ_comm_lic_bulk_reprint",
     *              "rep_typ_bulk_letter",
     *              "rep_typ_bulk_email"
     *          }
     *      }
     * })
     */
    protected $reportType;

    /**
     * Get report type
     *
     * @return string
     */
    public function getReportType()
    {
        return $this->reportType;
    }
}
