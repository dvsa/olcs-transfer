<?php
/**
 * Created by PhpStorm.
 * User: shaunhare
 * Date: 2018-11-28
 * Time: 12:57
 */

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

/**
 * Trait SurrenderIdOptional
 *
 * @package Dvsa\Olcs\Transfer\FieldType\Traits
 */
trait SurrenderIdOptional
{
    /**
     * @var int
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $surrenderId;

    /**
     * @return int
     */
    public function getSurrenderId(): ?int
    {
        return $this->surrenderId;
    }

    /**
     * @param int $surrenderId
     */
    public function setSurrenderId(int $surrenderId): void
    {
        $this->surrenderId = $surrenderId;
    }


}