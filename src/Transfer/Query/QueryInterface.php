<?php

/**
 * Query Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query;

use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Query Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface QueryInterface
{
    public function setInputFilter(InputFilterInterface $inputFilter);

    public function getInputFilter();

    public function setDto(ArraySerializableInterface $dto);

    public function getDto();

    public function setRouteName($routeName);

    public function getRouteName();

    public function isValid();

    public function getMessages();
}
