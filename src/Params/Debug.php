<?php

declare(strict_types=1);

namespace MetaSyntactical\SoapClientOptions\Params;

/**
 * Class Debug.
 *
 * @internal
 */
final class Debug
{
    /**
     * @var bool
     * @readonly
     */
    private $trace;

    /**
     * Debug constructor.
     *
     * @param bool $trace OPTIONAL defaults to false
     */
    public function __construct(bool $trace = false)
    {
        $this->trace = $trace;
    }

    /**
     * @return bool
     * @psalm-mutation-free
     */
    public function isTrace(): bool
    {
        return $this->trace;
    }
}
