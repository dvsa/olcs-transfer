<?php

/**
 * Abstract Command
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command;

/**
 * Abstract Command
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
abstract class AbstractCommand implements CommandInterface
{
    public static function create(array $data)
    {
        $command = new static();
        $command->exchangeArray($data);
        return $command;
    }
}
