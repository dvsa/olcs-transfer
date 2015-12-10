<?php

/**
 * Custom email validator
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
namespace Dvsa\Olcs\Transfer\Validators;

use Zend\Validator\Hostname;
use Zend\Validator\AbstractValidator;

/**
 * Custom email validator
 *
 * @NOTE Mostly moved from Zend's validator, however re-formatted to present friendlier errors
 *
 * @author Alex Peshkov <alex.peshkov@valtech.co.uk>
 */
class EmailAddress extends AbstractValidator
{
    /**
     * Should be consistent across the application, see OLCS-9884
     */
    const EMAIL_ADDRESS_MAX_LENGTH = 60;
    const INVALID            = 'emailAddressInvalid';
    const INVALID_FORMAT     = 'emailAddressInvalidFormat';
    const ERROR_INVALID      = 'emailAddressLengthNotInRange';

    /**
     * @var array
     */
    protected $messageTemplates = array(
        self::INVALID        => 'Invalid type given. String expected',
        self::INVALID_FORMAT => 'The input is not a valid email address.',
        self::ERROR_INVALID  => 'email-validator.error-message'
    );

    /**
     * @var array
     */
    protected $messageVariables = array(
        'hostname'  => 'hostname',
        'localPart' => 'localPart'
    );

    /**
     * @var string
     */
    protected $hostname;

    /**
     * @var string
     */
    protected $localPart;

    /**
     * Internal options array
     */
    protected $options = array(
        'useDomainCheck'    => true,
        'allow'             => Hostname::ALLOW_DNS,
        'hostnameValidator' => null,
    );

    /**
     * Instantiates hostname validator for local use
     *
     * The following additional option keys are supported:
     * 'hostnameValidator' => A hostname validator, see Zend\Validator\Hostname
     * 'allow'             => Options for the hostname validator, see Zend\Validator\Hostname::ALLOW_*
     *
     * @param array|\Traversable $options OPTIONAL
     */
    public function __construct($options = array())
    {
        if (!is_array($options)) {
            $options = func_get_args();
            $temp['allow'] = array_shift($options);
            if (!empty($options)) {
                $temp['useMxCheck'] = array_shift($options);
            }

            if (!empty($options)) {
                $temp['hostnameValidator'] = array_shift($options);
            }

            $options = $temp;
        }

        parent::__construct($options);
    }

    /**
     * Sets the validation failure message template for a particular key
     * Adds the ability to set messages to the attached hostname validator
     *
     * @param  string $messageString
     * @param  string $messageKey     OPTIONAL
     * @return AbstractValidator Provides a fluent interface
     */
    public function setMessage($messageString, $messageKey = null)
    {
        if ($messageKey === null) {
            $this->getHostnameValidator()->setMessage($messageString);
            parent::setMessage($messageString);
            return $this;
        }

        if (!isset($this->messageTemplates[$messageKey])) {
            $this->getHostnameValidator()->setMessage($messageString, $messageKey);
        } else {
            parent::setMessage($messageString, $messageKey);
        }

        return $this;
    }

    /**
     * Returns the set hostname validator
     *
     * If was not previously set then lazy load a new one
     *
     * @return Hostname
     */
    public function getHostnameValidator()
    {
        if (!isset($this->options['hostnameValidator'])) {
            $this->options['hostnameValidator'] = new Hostname($this->getAllow());
        }

        return $this->options['hostnameValidator'];
    }

    /**
     * @param Hostname $hostnameValidator OPTIONAL
     * @return EmailAddress Provides a fluent interface
     */
    public function setHostnameValidator(Hostname $hostnameValidator = null)
    {
        $this->options['hostnameValidator'] = $hostnameValidator;

        return $this;
    }

    /**
     * Returns the allow option of the attached hostname validator
     *
     * @return int
     */
    public function getAllow()
    {
        return $this->options['allow'];
    }

    /**
     * Sets the allow option of the hostname validator to use
     *
     * @param int $allow
     * @return EmailAddress Provides a fluent interface
     */
    public function setAllow($allow)
    {
        $this->options['allow'] = $allow;
        if (isset($this->options['hostnameValidator'])) {
            $this->options['hostnameValidator']->setAllow($allow);
        }

        return $this;
    }

    /**
     * Returns the set domainCheck option
     *
     * @return bool
     */
    public function getDomainCheck()
    {
        return $this->options['useDomainCheck'];
    }

    /**
     * Sets if the domain should also be checked
     * or only the local part of the email address
     *
     * @param  bool $domain
     * @return EmailAddress Fluid Interface
     */
    public function useDomainCheck($domain = true)
    {
        $this->options['useDomainCheck'] = (bool) $domain;
        return $this;
    }

    /**
     * Returns if the given host is reserved
     *
     * The following addresses are seen as reserved
     * '0.0.0.0/8', '10.0.0.0/8', '127.0.0.0/8'
     * '100.64.0.0/10'
     * '172.16.0.0/12'
     * '198.18.0.0/15'
     * '169.254.0.0/16', '192.168.0.0/16'
     * '192.0.2.0/24', '192.88.99.0/24', '198.51.100.0/24', '203.0.113.0/24'
     * '224.0.0.0/4', '240.0.0.0/4'
     * @see http://en.wikipedia.org/wiki/Reserved_IP_addresses
     *
     * As of RFC5753 (JAN 2010), the following blocks are no longer reserved:
     *   - 128.0.0.0/16
     *   - 191.255.0.0/16
     *   - 223.255.255.0/24
     * @see http://tools.ietf.org/html/rfc5735#page-6
     *
     * As of RFC6598 (APR 2012), the following blocks are now reserved:
     *   - 100.64.0.0/10
     * @see http://tools.ietf.org/html/rfc6598#section-7
     *
     * @param string $host
     * @return bool Returns false when minimal one of the given addresses is not reserved
     */
    protected function isReserved($host)
    {
        if (!preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $host)) {
            $host = gethostbynamel($host);
        } else {
            $host = array($host);
        }

        if (empty($host)) {
            return false;
        }

        foreach ($host as $server) {
            // Search for 0.0.0.0/8, 10.0.0.0/8, 127.0.0.0/8
            if (!preg_match('/^(0|10|127)(\.([0-9]|[1-9][0-9]|1([0-9][0-9])|2([0-4][0-9]|5[0-5]))){3}$/', $server) &&
                // Search for 100.64.0.0/10
                !preg_match('/^100\.(6[0-4]|[7-9][0-9]|1[0-1][0-9]|12[0-7])(\.([0-9]|[1-9][0-9]|1([0-9][0-9])|2([0-4][0-9]|5[0-5]))){2}$/', $server) &&
                // Search for 172.16.0.0/12
                !preg_match('/^172\.(1[6-9]|2[0-9]|3[0-1])(\.([0-9]|[1-9][0-9]|1([0-9][0-9])|2([0-4][0-9]|5[0-5]))){2}$/', $server) &&
                // Search for 198.18.0.0/15
                !preg_match('/^198\.(1[8-9])(\.([0-9]|[1-9][0-9]|1([0-9][0-9])|2([0-4][0-9]|5[0-5]))){2}$/', $server) &&
                // Search for 169.254.0.0/16, 192.168.0.0/16
                !preg_match('/^(169\.254|192\.168)(\.([0-9]|[1-9][0-9]|1([0-9][0-9])|2([0-4][0-9]|5[0-5]))){2}$/', $server) &&
                // Search for 192.0.2.0/24, 192.88.99.0/24, 198.51.100.0/24, 203.0.113.0/24
                !preg_match('/^(192\.0\.2|192\.88\.99|198\.51\.100|203\.0\.113)\.([0-9]|[1-9][0-9]|1([0-9][0-9])|2([0-4][0-9]|5[0-5]))$/', $server) &&
                // Search for 224.0.0.0/4, 240.0.0.0/4
                !preg_match('/^(2(2[4-9]|[3-4][0-9]|5[0-5]))(\.([0-9]|[1-9][0-9]|1([0-9][0-9])|2([0-4][0-9]|5[0-5]))){3}$/', $server)
            ) {
                return false;
            }
        }

        return true;
    }

    /**
     * Internal method to validate the local part of the email address
     *
     * @return bool
     */
    protected function validateLocalPart()
    {
        // Dot-atom characters are: 1*atext *("." 1*atext)
        // atext: ALPHA / DIGIT / and "!", "#", "$", "%", "&", "'", "*",
        //        "+", "-", "/", "=", "?", "^", "_", "`", "{", "|", "}", "~"
        $atext = 'a-zA-Z0-9\x21\x23\x24\x25\x26\x27\x2a\x2b\x2d\x2f\x3d\x3f\x5e\x5f\x60\x7b\x7c\x7d\x7e';
        if (preg_match('/^[' . $atext . ']+(\x2e+[' . $atext . ']+)*$/', $this->localPart)) {
            return true;
        }

        // Try quoted string format (RFC 5321 Chapter 4.1.2)

        // Quoted-string characters are: DQUOTE *(qtext/quoted-pair) DQUOTE
        $qtext      = '\x20-\x21\x23-\x5b\x5d-\x7e'; // %d32-33 / %d35-91 / %d93-126
        $quotedPair = '\x20-\x7e'; // %d92 %d32-126
        if (preg_match('/^"(['. $qtext .']|\x5c[' . $quotedPair . '])*"$/', $this->localPart)) {
            return true;
        }

        return false;
    }

    /**
     * Internal method to validate the hostname part of the email address
     *
     * @return bool
     */
    protected function validateHostnamePart()
    {
        return $this->getHostnameValidator()->setTranslator($this->getTranslator())
            ->isValid($this->hostname);
    }

    /**
     * Splits the given value in hostname and local part of the email address
     *
     * @param string $value Email address to be split
     * @return bool Returns false when the email can not be split
     */
    protected function splitEmailParts($value)
    {
        // Split email address up and disallow '..'
        if ((strpos($value, '..') !== false) or
            (!preg_match('/^(.+)@([^@]+)$/', $value, $matches))) {
            return false;
        }

        $this->localPart = $matches[1];
        $this->hostname  = $matches[2];

        return true;
    }

    /**
     * Defined by Zend\Validator\ValidatorInterface
     *
     * Returns true if and only if $value is a valid email address
     * according to RFC2822
     *
     * @link   http://www.ietf.org/rfc/rfc2822.txt RFC2822
     * @link   http://www.columbia.edu/kermit/ascii.html US-ASCII characters
     * @param  string $value
     * @return bool
     */
    public function isValid($value)
    {
        // Check length
        if (strlen($value) > self::EMAIL_ADDRESS_MAX_LENGTH) {
            $this->error(self::ERROR_INVALID);
            return false;
        }

        // Check string
        if (!is_string($value)) {
            $this->error(self::INVALID);
            return false;
        }

        $this->setValue($value);

        // Split email address up and disallow '..'
        if (!$this->splitEmailParts($value)) {
            $this->error(self::INVALID_FORMAT);
            return false;
        }

        // Match hostname part
        if ($this->options['useDomainCheck']) {
            $hostname = $this->validateHostnamePart();
            if ($hostname === false) {
                $this->error(self::INVALID_FORMAT);
                return false;
            }
        }

        $local = $this->validateLocalPart();

        if ($local === false) {
            $this->error(self::INVALID_FORMAT);
            return false;
        }

        return true;
    }
}
