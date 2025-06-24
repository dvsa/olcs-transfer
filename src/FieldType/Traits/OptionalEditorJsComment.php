<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * Optional EditorJS Comment Field
 */
trait OptionalEditorJsComment
{
    /**
     * @Transfer\Filter("Laminas\Filter\StringTrim")
     * @Transfer\Validator("Laminas\Validator\IsJsonString")
     * @Transfer\Optional
     */
    protected $comment;

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }
}