<?php


namespace Dvsa\Olcs\Transfer\Command\Variation;

/**
 * @Transfer\RouteName("backend/variation/single/grantDirectorChange")
 * @Transfer\Method("PUT")
 */
class GrantDirectorChange extends AbstractCommand
{
    use Identity;
}