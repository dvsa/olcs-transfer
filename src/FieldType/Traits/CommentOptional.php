<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait Optional Comment
 *
 * @package Dvsa\Olcs\Transfer\Command\Traits\FieldType
 * @author Valtech <uk@valtech.co.uk>
 */
trait CommentOptional
{
    use Comment;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":4000}})
     */
    protected $comment;
}
