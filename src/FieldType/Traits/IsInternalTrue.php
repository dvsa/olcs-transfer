<?php

declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait IsInternalTrue
{
    public function getIsInternal(): bool
    {
        return true;
    }
}
