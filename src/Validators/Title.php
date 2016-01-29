<?php

namespace Dvsa\Olcs\Transfer\Validators;

/**
 * Title validator
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
class Title extends \Zend\Validator\InArray
{
    protected $haystack = ['title_dr', 'title_miss', 'title_mr', 'title_mrs', 'title_ms'];

    protected $messageTemplates = array(
        self::NOT_IN_ARRAY => 'The input is not a valid Title',
    );
}
