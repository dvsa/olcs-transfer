<?php

/**
 * ContinueIfEmpty
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

/**
 * @Annotation
 */
class ContinueIfEmpty
{
    /**
     * @var bool
     */
    protected $continueIfEmpty = false;

    /**
     * Receive and process the contents of an annotation
     *
     * @param  array $data
     */
    public function __construct(array $data)
    {
        if (!isset($data['value'])) {
            $data['value'] = true;
        }

        $this->continueIfEmpty = $data['value'];
    }

    /**
     * Get value of continueIfEmpty flag
     *
     * @return bool
     */
    public function getContinueIfEmpty()
    {
        return $this->continueIfEmpty;
    }
}
