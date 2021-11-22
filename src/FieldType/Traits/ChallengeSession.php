<?php
namespace Dvsa\Olcs\Transfer\FieldType\Traits;

trait ChallengeSession
{
    /**
     * @var String
     * @Transfer\Validator({"name":"Laminas\Validator\StringLength", "options":{"min":20, "max":2048}})
     */
    protected ?string $challengeSession = null;

    /**
     * @return ?string
     */
    public function getChallengeSession(): ?string
    {
        return $this->challengeSession;
    }
}
