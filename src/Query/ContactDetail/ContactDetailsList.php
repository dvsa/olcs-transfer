<?php

/**
 * Get a list of ContactDetails
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\ContactDetail;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\OrderedQueryInterface;
use Dvsa\Olcs\Transfer\Query\OrderedTrait;
use Dvsa\Olcs\Transfer\Query\PagedQueryInterface;
use Dvsa\Olcs\Transfer\Query\PagedTrait;

/**
 * @Transfer\RouteName("backend/contact-details")
 */
class ContactDetailsList extends AbstractQuery implements PagedQueryInterface, OrderedQueryInterface
{
    use PagedTrait;
    use OrderedTrait;

    /**
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     * @Transfer\Filter({"name":"Zend\Filter\StringToLower"})
     * @Transfer\Validator(
     *  {
     *      "name":"Zend\Validator\InArray",
     *      "options":{
     *          "haystack": {
     *              "ct_complainant", "ct_corr", "ct_driver", "ct_est", "ct_hackney", "ct_irfo_op",
     *              "ct_obj", "ct_partner", "ct_reg", "ct_rep", "ct_requestor", "ct_ta", "ct_tcon",
     *              "ct_team_user", "ct_tm", "ct_user", "ct_work"
     *          }
     *      }
     *  }
     * )
     * @Transfer\Optional
     */
    protected $contactType;

    public function getContactType()
    {
        return $this->contactType;
    }
}
