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
     */
    private $trace;

    /**
     * Debug constructor.
     *
     * @param null|bool $trace
     */
    public function __construct(?bool $trace = false)
    {
        $this->trace = $trace;
    }

    /**
     * @return bool
     */
    public function isTrace(): bool
    {
        return $this->trace;
    }
}
