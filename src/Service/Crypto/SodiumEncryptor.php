<?php

namespace Dvsa\Olcs\Transfer\Service\Crypto;

use Random\RandomException;

final class SodiumEncryptor implements EncryptorInterface
{
    private const KEY_LEN = SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_KEYBYTES;
    private const NONCE_LEN = SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_NPUBBYTES;

    private static function ensureKey(string $key): string
    {
        if (\strlen($key) === self::KEY_LEN) {
            return $key;
        }
        // allow base64-encoded keys in config/secrets
        $decoded = base64_decode($key, true);
        if ($decoded !== false && \strlen($decoded) === self::KEY_LEN) {
            return $decoded;
        }
        throw new \InvalidArgumentException('Invalid key length for sodium (need 32 bytes, raw or base64).');
    }

    /**
     * @throws RandomException
     * @throws \SodiumException
     */
    #[\Override]
    public function encrypt(string $key, string $plaintext, ?string $aad = null): string
    {
        $k = self::ensureKey($key);
        $n = random_bytes(self::NONCE_LEN);

        $ct = sodium_crypto_aead_xchacha20poly1305_ietf_encrypt(
            $plaintext,
            $aad ?? '',
            $n,
            $k
        );

        // prefix nonce; return base64 for storage
        return base64_encode($n . $ct);
    }

    /**
     * @throws \SodiumException
     */
    #[\Override]
    public function decrypt(string $key, string $ciphertext, ?string $aad = null): string
    {
        $k = self::ensureKey($key);
        $bin = base64_decode($ciphertext, true);
        if ($bin === false || \strlen($bin) <= self::NONCE_LEN) {
            throw new \RuntimeException('Malformed ciphertext.');
        }

        $n = substr($bin, 0, self::NONCE_LEN);
        $ct = substr($bin, self::NONCE_LEN);

        $pt = sodium_crypto_aead_xchacha20poly1305_ietf_decrypt(
            $ct,
            $aad ?? '',
            $n,
            $k
        );

        if ($pt === false) {
            throw new \RuntimeException('Decryption failed.');
        }

        return $pt;
    }
}
