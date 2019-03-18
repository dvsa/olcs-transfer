<?php

/**
 * Update template source
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Command\Email;

use Dvsa\Olcs\Transfer\FieldType\Traits\EmailTemplateFormat;
use Dvsa\Olcs\Transfer\FieldType\Traits\EmailTemplateLocale;
use Dvsa\Olcs\Transfer\FieldType\Traits\EmailTemplateName;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;
use Dvsa\Olcs\Transfer\Command\AbstractCommand;

/**
 * @Transfer\RouteName("backend/email/update-template-source")
 * @Transfer\Method("PUT")
 */
final class UpdateTemplateSource extends AbstractCommand
{
    use EmailTemplateFormat, EmailTemplateLocale, EmailTemplateName;

    /** @var string */
    protected $source;

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }
}
