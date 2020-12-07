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
     * @var String
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"max":4000}})
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
