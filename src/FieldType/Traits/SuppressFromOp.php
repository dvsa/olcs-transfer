<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Suppress From OP
 */
trait SuppressFromOp
{
    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Dvsa\Olcs\Transfer\Validators\YesNo"})
     * @Transfer\Optional
     */
    protected $suppressFromOp;

    /**
     * @return string
     */
    public function getSuppressFromOp()
    {
        return $this->suppressFromOp;
    }
}
