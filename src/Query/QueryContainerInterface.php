<?php

/**
 * Query Container Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query;

use Zend\InputFilter\InputFilterInterface;
use Dvsa\Olcs\Transfer\Query\QueryInterface;

/**
 * Query Container Interface
 *
 * @author Rob Caiger <rob@clocal.co.uk>
 */
interface QueryContainerInterface
{
    public function setInputFilter(InputFilterInterface $inputFilter);

    public function getInputFilter();

    public function setDto(QueryInterface $dto);

    public function getDto();

    public function setRouteName($routeName);

    public function getRouteName();

    public function isValid();

    public function getMessages();
}
