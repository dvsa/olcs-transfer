<?php

namespace Dvsa\Olcs\Transfer\Command;

/**
 * Abstract Command
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
abstract class AbstractCommand implements CommandInterface
{
    /**
     * Create a command
     *
     * @param array $data data from the command
     *
     * @return static
     */
    public static function create(array $data)
    {
        $command = new static();
        $command->exchangeArray($data);
        return $command;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param array $array data to be mapped to object
     *
     * @return void
     */
    public function exchangeArray(array $array)
    {
        $values = get_object_vars($this);
        foreach (array_keys($values) as $property) {
            if (array_key_exists($property, $array)) {
                $this->$property = $array[$property];
            }
        }
    }

    /**
     * Get the object properties
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
