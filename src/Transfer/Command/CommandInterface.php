<?php

/**
 * Command Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command;

use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Command Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface CommandInterface
{
    public function setInputFilter(InputFilterInterface $inputFilter);

    public function getInputFilter();

    public function setDto(ArraySerializableInterface $dto);

    public function getDto();

    public function setRouteName($routeName);

    public function getRouteName();

    public function setMethod($method);

    public function getMethod();

    public function isValid();

    public function getMessages();
}
