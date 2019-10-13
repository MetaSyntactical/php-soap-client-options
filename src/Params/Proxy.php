<?php

declare(strict_types=1);

namespace MetaSyntactical\SoapClientOptions\Params;

use Assert\Assertion;

/**
 * Class Proxy.
 *
 * @internal
 *
 * @todo validate IP or domain name ($host)
 */
final class Proxy
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port;

    /**
     * Proxy constructor.
     *
     * @param string $host
     * @param string $port
     *
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $host, string $port)
    {
        Assertion::regex($host, '/^https?:\/\/.*$/', 'Baseurl %s must be a fully qualified domain name or IP address prefixed with http:// or https://');
        Assertion::integerish($port, 'Port "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($port, 0, 'Expected a port number greater than or equal to %2$s. Got: %s');
        Assertion::lessOrEqualThan($port, 65535, 'Expected a port number lesser than or queal to %2$s. Got: %s');
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }
}
