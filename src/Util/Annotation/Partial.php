<?php

/**
 * Partial
 */
namespace Dvsa\Olcs\Transfer\Util\Annotation;

use function is_array;
use function sprintf;
use function trigger_error;

use const E_USER_DEPRECATED;

/**
 * Partial annotation - ComposedObject
 *
 * See Laminas\Form\Annotation\ComposedObject
 *
 * @Annotation
 * @NamedArgumentConstructor
 */

final class Partial
{
    /** @var string|null */
    protected $targetObject;

    /** @var bool */
    protected $isCollection;

    /** @var array */
    protected $options;

    /**
     * Receive and process the contents of an annotation
     *
     * @param array|string $targetObject
     * @param array $options
     */
    public function __construct($targetObject, bool $isCollection = false, array $options = [])
    {
        if (is_array($targetObject)) {
            // support for legacy notation with array as first parameter
            trigger_error(sprintf(
                'Passing a single array to the constructor of %s is deprecated since 3.0.0,'
                . ' please use separate parameters.',
                static::class
            ), E_USER_DEPRECATED);

            $this->targetObject = $targetObject['target_object'] ?? null;
            $this->isCollection = $targetObject['is_collection'] ?? $isCollection;
            $this->options = $targetObject['options'] ?? $options;
        } else {
            $this->targetObject = $targetObject;
            $this->isCollection = $isCollection;
            $this->options = $options;
        }
    }

    /**
     * Retrieve the composed object classname
     */
    public function getComposedObject(): ?string
    {
        return $this->targetObject;
    }

    /**
     * Is this composed object a collection or not
     */
    public function isCollection(): bool
    {
        return $this->isCollection;
    }

    /**
     * Retrieve the options for the composed object
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
