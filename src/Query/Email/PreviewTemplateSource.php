<?php

/**
 * Preview an email template prior to saving
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
 * @Transfer\RouteName("backend/email/preview-template-source")
 */
class PreviewTemplateSource extends AbstractQuery
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
