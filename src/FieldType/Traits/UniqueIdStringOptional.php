<?php

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Unique id string (optional parameter for caches)
 *
 * @author Ian Lindsay <ian@hemera-business-services.co.uk>
 */
trait UniqueIdStringOptional
{
    /**
     * @var string
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Laminas\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"max":512}})
     */
    protected $uniqueId;

    /**
     * @return string
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }
}
