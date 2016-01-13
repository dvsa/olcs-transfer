<?php

/**
 * Command Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command;

use Zend\Stdlib\ArraySerializableInterface;

/**
 * Command Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface CommandInterface extends ArraySerializableInterface
{
    public static function create(array $data);
}
