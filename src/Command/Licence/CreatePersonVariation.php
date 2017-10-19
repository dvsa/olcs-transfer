<?php
/**
 *  Person Variation
 * @author Shaun Hare - shaun.hare@dvsa.gov.uk
 */

namespace Dvsa\Olcs\Transfer\Command\Licence;

use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractPeople;

/**
 * @Transfer\RouteName("backend/licence/person")
 * @Transfer\Method("POST")
 */
final class CreatePersonVariation extends AbstractPeople
{


}