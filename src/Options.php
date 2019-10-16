<?php

declare(strict_types=1);

namespace MetaSyntactical\SoapClientOptions;

use MetaSyntactical\SoapClientOptions\Params\CacheWsdl;
use MetaSyntactical\SoapClientOptions\Params\Credentials;
use MetaSyntactical\SoapClientOptions\Params\Debug;
use MetaSyntactical\SoapClientOptions\Params\Location;
use MetaSyntactical\SoapClientOptions\Params\Proxy;
use MetaSyntactical\SoapClientOptions\Params\Security;
use MetaSyntactical\SoapClientOptions\Params\SoapVersion;

/**
 * Class Options.
 *
 * @todo alternative constructor (from options array, as validator)
 * @todo add more params for options like 'soap_version', 'uri', 'style', ...
 */
final class Options
{
    /**
     * @var null|Credentials
     */
    private $credentials;

    /**
     * @var null|Debug
     */
    private $debug;

    /**
     * @var Location
     */
    private $location;

    /**
     * @var null|Proxy
     */
    private $proxy;

    /**
     * @var null|Security
     */
    private $security;

    /**
     * @var null|SoapVersion
     */
    private $soapVersion;

    /**
     * @var null|CacheWsdl
     */
    private $cacheWsdl;

    /**
     * Options constructor.
     *
     * @param Location         $location
     * @param null|Credentials $credentials
     * @param null|Debug       $debug
     * @param null|Proxy       $proxy
     * @param null|Security    $security
     * @param null|SoapVersion $soapVersion
     * @param null|CacheWsdl   $cacheWsdl
     */
    public function __construct(
        Location $location,
        ?Credentials $credentials = null,
        ?Debug $debug = null,
        ?Proxy $proxy = null,
        ?Security $security = null,
        ?SoapVersion $soapVersion = null,
        ?CacheWsdl $cacheWsdl = null
    ) {
        $this->credentials = $credentials;
        $this->debug = $debug;
        $this->location = $location;
        $this->proxy = $proxy;
        $this->security = $security;
        $this->soapVersion = $soapVersion;
        $this->cacheWsdl = $cacheWsdl;
    }

    /**
     * Get options as associative array for SoapClient.
     *
     * Output values have been checked and can be passed to the SoapClient
     * constructor.
     *
     * @see \SoapClient
     * @psalm-mutation-free
     *
     * @param string $endpoint SOAP service endpoint (URL without base URL and port)
     *
     * @return array
     */
    public function getOptionsArray(string $endpoint): array
    {
        $options = [];
        $streamContext = $this->getStreamContext();
        $options['location'] = $this->location->getBaseUrl() . ':' . $this->location->getPort() . '/' . $endpoint;
        if (!is_null($this->credentials)) {
            $options['login'] = $this->credentials->getLogin();
            $options['password'] = $this->credentials->getLogin();
        }
        if (!is_null($streamContext)) {
            $options['stream_context'] = $streamContext;
        }
        if (!is_null($this->debug)) {
            $options['trace'] = $this->debug->isTrace();
            $options['exceptions'] = $this->debug->isConvertErrorsToSoapFaults();
        }
        if (!is_null($this->proxy)) {
            $options['proxy_host'] = $this->proxy->getHost();
            $options['proxy_port'] = $this->proxy->getPort();
        }
        if (!is_null($this->soapVersion)) {
            $options['soap_version'] = (string) $this->soapVersion;
        }
        if (!is_null($this->cacheWsdl)) {
            $options['cache_wsdl'] = (string) $this->cacheWsdl;
        }

        return $options;
    }

    /**
     * @psalm-mutation-free
     *
     * @return null|resource
     */
    private function getStreamContext()
    {
        $context = null;
        if (!is_null($this->security)) {
            $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => $this->security->isVerifyPeer(),
                    'verify_peer_name' => $this->security->isVerifyPeerName(),
                    'allow_self_signed' => $this->security->isAllowSelfSigned(),
                ],
            ]);
        }

        return $context;
    }
}
