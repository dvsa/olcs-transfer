<?php

/**
 * Create ECMT Permit Application
 *
 * @author Tonci Vidovic <tonci.vidovic@capgemini.com>
 */
namespace Dvsa\Olcs\Transfer\Command\Permits;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/permits/ecmt-permits-update-declaration")
 * @Transfer\Method("PUT")
 */
final class UpdateDeclaration extends AbstractCommand
{
    use Identity;

    /**
     * @var bool
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     */
    protected $declaration;

    /**
     * @return int
     */
    public function getDeclaration()
    {
        return $this->declaration;
    }
}
