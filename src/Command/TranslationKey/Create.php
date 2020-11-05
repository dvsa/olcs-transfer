<?php

/**
 * Create Translation Key
 */
namespace Dvsa\Olcs\Transfer\Command\TranslationKey;

use Dvsa\Olcs\Transfer\FieldType\Traits\DescriptionOptional;
use Dvsa\Olcs\Transfer\FieldType\Traits\IdentityString;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

use Dvsa\Olcs\Transfer\FieldType\Traits\TranslationsArray;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/translation-key/single")
 * @Transfer\Method("POST")
 */
final class Create extends AbstractCommand
{
    use IdentityString;
    use TranslationsArray;
    use DescriptionOptional;
}
