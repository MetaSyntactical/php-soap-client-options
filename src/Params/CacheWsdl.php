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
    public const WSDL_CACHE_NONE = WSDL_CACHE_NONE;
    public const WSDL_CACHE_DISK = WSDL_CACHE_DISK;
    public const WSDL_CACHE_MEMORY = WSDL_CACHE_MEMORY;
    public const WSDL_CACHE_BOTH = WSDL_CACHE_BOTH;
}
