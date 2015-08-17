<?php

namespace Dvsa\Olcs\Transfer\Validators;

/**
 * LicenceStatus Validator
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
class LicenceStatus extends \Zend\Validator\InArray
{
    protected $haystack = [
        'lsts_consideration',
        'lsts_not_submitted',
        'lsts_suspended',
        'lsts_valid',
        'lsts_curtailed',
        'lsts_granted',
        'lsts_surrendered',
        'lsts_withdrawn',
        'lsts_refused',
        'lsts_revoked',
        'lsts_ntu',
        'lsts_terminated',
        'lsts_cns',
    ];

    protected $messageTemplates = array(
        self::NOT_IN_ARRAY => 'The input is not a valid Licence status',
    );
}