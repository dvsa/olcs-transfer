<?php

/**
 * Get the source of an email template
 *
 * @author Jonathan Thomas <jonathan@opalise.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Query\Email;

use Dvsa\Olcs\Transfer\FieldType\Traits\EmailTemplateFormat;
use Dvsa\Olcs\Transfer\FieldType\Traits\EmailTemplateLocale;
use Dvsa\Olcs\Transfer\FieldType\Traits\EmailTemplateName;
use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/email/template-source")
 */
class TemplateSource extends AbstractQuery
{
    use EmailTemplateFormat, EmailTemplateLocale, EmailTemplateName;
}
