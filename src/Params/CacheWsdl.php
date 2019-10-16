<?php

declare(strict_types=1);

namespace MetaSyntactical\SoapClientOptions\Params;

/**
 * Class CacheWsdl.
 *
 * @internal
 */
final class CacheWsdl extends AbstractEnum
{
    public const WSDL_CACHE_NONE = 0; // WSDL_CACHE_NONE;
    public const WSDL_CACHE_DISK = 1; // WSDL_CACHE_DISK;
    public const WSDL_CACHE_MEMORY = 2; // WSDL_CACHE_MEMORY;
    public const WSDL_CACHE_BOTH = 3; // WSDL_CACHE_BOTH;
}
