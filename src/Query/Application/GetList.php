<?php

/**
 * Get a list of Application
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Application;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/application")
 */
final class GetList extends AbstractQuery implements \Dvsa\Olcs\Transfer\Query\OrderedQueryInterface
{
    use \Dvsa\Olcs\Transfer\Query\OrderedTraitOptional;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\Digits"})
     * @Transfer\Validator({"name":"Zend\Validator\GreaterThan", "options": {"min": 0}})
     */
    protected $organisation;

    /**
     * Get a Organsation ID
     *
     * @return int
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
}