<?php

namespace Dvsa\Olcs\Transfer\Validators;

/**
 * Order validator
 *
 * @author Mat Evans <mat.evans@valtech.co.uk>
 */
class Order extends \Laminas\Validator\AbstractValidator
{
    protected const NOT_ASC_OR_DESC = 'notAscOrDesc';

    protected $messageTemplates = array(
        self::NOT_ASC_OR_DESC => 'The order was not ASC or DESC',
    );

    public function isValid($value)
    {
        $values = explode(',', $value);
        foreach ($values as $order) {
            $order = trim(strtoupper($order));
            if ($order !== 'ASC' && $order !== 'DESC') {
                $this->error(self::NOT_ASC_OR_DESC);
                return false;
            }
        }

        return true;
    }
}
