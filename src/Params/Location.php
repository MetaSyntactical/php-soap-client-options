<?php

declare(strict_types=1);

namespace MetaSyntactical\SoapClientOptions\Params;

use Assert\Assertion;

/**
 * Class Location.
 *
 * @internal
 *
 * @todo validate IP or domain name ($baseUrl)
 */
final class Location
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var int
     */
    private $port;

    /**
     * Location constructor.
     *
     * @param string     $baseUrl
     * @param int|string $port
     *
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $baseUrl, $port)
    {
        Assertion::regex($baseUrl, '/^https?:\/\/.*$/', 'Baseurl %s must be a fully qualified domain name or IP address prefixed with http:// or https://');
        Assertion::integerish($port, 'Port "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($port, 0, 'Expected a port number greater than or equal to %2$s. Got: %s');
        Assertion::lessOrEqualThan($port, 65535, 'Expected a port number lesser than or queal to %2$s. Got: %s');
        $this->baseUrl = $baseUrl;
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return (string) $this->port;
    }
}
