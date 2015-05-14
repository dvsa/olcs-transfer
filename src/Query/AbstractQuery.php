<?php

/**
 * Abstract Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query;

/**
 * Abstract Query
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
abstract class AbstractQuery implements QueryInterface
{
    public static function create(array $data)
    {
        $command = new static();
        $command->exchangeArray($data);
        return $command;
    }
}
