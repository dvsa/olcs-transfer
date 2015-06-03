<?php

namespace Dvsa\Olcs\Transfer\Command\Cases\Impounding;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/impoundings")
 * @Transfer\Method("DELETE")
 */
class DeleteImpounding extends AbstractCommand
{
    /**
     * @todo add validators
     */
    protected $id = null;

    /**
     * @todo add validators
     */
    protected $version = null;

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

}
