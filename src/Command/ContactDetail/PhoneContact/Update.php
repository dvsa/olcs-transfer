<?php

namespace Dvsa\Olcs\Transfer\Command\ContactDetail\PhoneContact;

use Dvsa\Olcs\Transfer\FieldType\Traits\Identity;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/contact-details/phone-contact/single")
 * @Transfer\Method("PUT")
 */
class Update extends Create
{
    use Identity;
}
