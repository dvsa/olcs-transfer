<?php

namespace Dvsa\Olcs\Transfer\Command;

/** @phpstan-consistent-constructor */
abstract class AbstractCommand implements CommandInterface
{
    final public function __construct()
    {
    }

    /**
     * Create instance of a command
     *
     * @param array $data data
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
     * @param array $array array of variables
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
     * Return variables as an array
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
