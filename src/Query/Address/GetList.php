<?php

/**
 * Get a list
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Address;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;

/**
 * @Transfer\RouteName("backend/address/list")
 */
final class GetList extends AbstractQuery
{
    /**
     * @var String
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Validator({"name":"Zend\Validator\StringLength", "options":{"max":8}})
     */
    protected $postcode;

    /**
     * Get a postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }
}
