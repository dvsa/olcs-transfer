<?php

declare(strict_types=1);

namespace Dvsa\OlcsTest\Transfer\Service\Crypto;

use Dvsa\Olcs\Transfer\Service\Crypto\SodiumEncryptor;
use PHPUnit\Framework\TestCase;
use Random\RandomException;

final class SodiumEncryptorTest extends TestCase
{
    private const RAW_KEY_LEN = SODIUM_CRYPTO_AEAD_XCHACHA20POLY1305_IETF_KEYBYTES;

    /**
     * @throws RandomException
     */
    private function randomRawKey(): string
    {
        return random_bytes(self::RAW_KEY_LEN);
    }

    private function randomBase64Key(): string
    {
        return base64_encode($this->randomRawKey());
    }

    /**
     * @throws RandomException
     * @throws \SodiumException
     */
    public function testEncryptDecryptWithRawKey(): void
    {
        $enc  = new SodiumEncryptor();
        $key  = $this->randomRawKey();
        $msg  = 'Hello, sodium!';
        $aad  = 'context:cache';

        $ct = $enc->encrypt($key, $msg, $aad);
        $pt = $enc->decrypt($key, $ct, $aad);

        $this->assertSame($msg, $pt);
        $this->assertNotEmpty($ct);
        $this->assertNotSame($msg, $ct, 'Ciphertext must not equal plaintext');
    }

    /**
     * @throws RandomException
     * @throws \SodiumException
     */
    public function testEncryptDecryptWithBase64Key(): void
    {
        $enc  = new SodiumEncryptor();
        $key  = $this->randomBase64Key(); // base64 form accepted
        $msg  = 'payload';
        $aad  = null; // AAD optional

        $ct = $enc->encrypt($key, $msg, $aad);
        $pt = $enc->decrypt($key, $ct, $aad);

        $this->assertSame($msg, $pt);
    }

    /**
     * @throws RandomException
     * @throws \SodiumException
     */
    public function testEncryptUsesRandomNonceCiphertextsDiffer(): void
    {
        $enc = new SodiumEncryptor();
        $key = $this->randomRawKey();
        $msg = 'same message';
        $aad = 'same aad';

        $ct1 = $enc->encrypt($key, $msg, $aad);
        $ct2 = $enc->encrypt($key, $msg, $aad);

        // With a random nonce, re-encrypting should produce different ciphertexts
        $this->assertNotSame($ct1, $ct2);
    }

    /**
     * @throws RandomException
     * @throws \SodiumException
     */
    public function testDecryptWithWrongAadFails(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Decryption failed.');

        $enc = new SodiumEncryptor();
        $key = $this->randomRawKey();
        $msg = 'secret';

        $ct = $enc->encrypt($key, $msg, 'right-aad');

        // Wrong AAD -> auth fails
        $enc->decrypt($key, $ct, 'wrong-aad');
    }

    public function testDecryptWithMalformedCiphertextFails(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Malformed ciphertext.');

        $enc = new SodiumEncryptor();
        $key = $this->randomRawKey();

        // Not valid base64 -> base64_decode returns false
        $enc->decrypt($key, '***not-base64***', null);
    }

    /**
     * @throws RandomException
     * @throws \SodiumException
     */
    public function testDecryptWithTruncatedCiphertextFails(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Malformed ciphertext.');

        $enc = new SodiumEncryptor();
        $key = $this->randomRawKey();

        // Base64 of fewer bytes than the nonce length => malformed
        $truncated = base64_encode(random_bytes(8));
        $enc->decrypt($key, $truncated, null);
    }

    /**
     * @throws RandomException
     * @throws \SodiumException
     */
    public function testEncryptWithInvalidKeyLengthThrowsEarly(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid key length for sodium');

        $enc = new SodiumEncryptor();
        $badKey = 'short'; // neither 32 bytes raw nor valid base64 of 32 bytes
        $enc->encrypt($badKey, 'data', null);
    }
}
