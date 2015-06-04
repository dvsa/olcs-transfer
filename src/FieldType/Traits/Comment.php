<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Comment
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait Comment
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":4000}})
     */
    protected $comment;

    /**
     * @return int
     */
    public function getComment()
    {
        return $this->comment;
    }
}
