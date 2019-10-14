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
    private $convertErrorsToSoapFaults;

    /**
     * @var bool
     * @readonly
     */
    private $trace;

    /**
     * Debug constructor.
     *
     * @param bool $convertErrorsToSoapFaults OPTIONAL defaults to true
     * @param bool $trace                     OPTIONAL defaults to false
     */
    public function __construct(
        bool $convertErrorsToSoapFaults = true,
        bool $trace = false
    ) {
        $this->convertErrorsToSoapFaults = $convertErrorsToSoapFaults;
        $this->trace = $trace;
    }

    /**
     * @return bool
     * @psalm-mutation-free
     */
    public function isConvertErrorsToSoapFaults(): bool
    {
        return $this->convertErrorsToSoapFaults;
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
