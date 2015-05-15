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

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return void
     */
    public function exchangeArray(array $array)
    {
        $values = get_object_vars($this);

        foreach (array_keys($values) as $property) {
            if (isset($array[$property])) {
                $this->$property = $array[$property];
            }
        }
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
