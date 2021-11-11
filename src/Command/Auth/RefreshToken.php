<?php
declare(strict_types=1);

namespace Dvsa\Olcs\Transfer\Command\Auth;

use Dvsa\Olcs\Transfer\Command\AbstractCommand;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @Transfer\RouteName("backend/auth/refresh-token")
 * @Transfer\Method("POST")
 */
class RefreshToken extends AbstractCommand
{
    /**
     * @var string|null
     */
    protected ?string $refreshToken = null;

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }
}
