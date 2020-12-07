<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Ebsr display status trait
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
trait EbsrDisplayStatus
{
    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({
     *      "name":"Laminas\Validator\InArray",
     *      "options": {
     *          "haystack": {
     *              "ebsrd_processing", "ebsrd_processed", "ebsrd_failed"
     *          }
     *      }
     * })
     */
    protected $status;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
