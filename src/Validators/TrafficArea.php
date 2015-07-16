<?php

/**
 * Traffic Area Validator
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Validators;

/**
 * Traffic Area Validator
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
class TrafficArea extends \Zend\Validator\InArray
{
    protected $haystack = ['B', 'C', 'D', 'F', 'G', 'H', 'K', 'M', 'N'];

    protected $messageTemplates = array(
        self::NOT_IN_ARRAY => 'The input is not a valid Traffic Area Code',
    );
}
