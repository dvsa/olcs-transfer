<?php

namespace Dvsa\Olcs\Transfer\Service\Crypto;

interface EncryptorInterface
{
    public function encrypt(string $key, string $plaintext, ?string $aad = null): string;

    public function decrypt(string $key, string $ciphertext, ?string $aad = null): string;
}
