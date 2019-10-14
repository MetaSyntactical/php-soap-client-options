<?php

declare(strict_types=1);

namespace MetaSyntactical\SoapClientOptions\Params;

/**
 * Class Security.
 *
 * @internal
 */
final class Security
{
    /**
     * @var bool
     * @readonly
     */
    private $verifyPeer;

    /**
     * @var bool
     * @readonly
     */
    private $verifyPeerName;

    /**
     * @var bool
     * @readonly
     */
    private $allowSelfSigned;

    /**
     * Security constructor.
     *
     * @param bool $verifyPeer      OPTIONAL defaults to true
     * @param bool $verifyPeerName  OPTIONAL defaults to true
     * @param bool $allowSelfSigned OPTIONAL defaults to false
     */
    public function __construct(bool $verifyPeer = true, bool $verifyPeerName = true, bool $allowSelfSigned = false)
    {
        $this->verifyPeer = $verifyPeer;
        $this->verifyPeerName = $verifyPeerName;
        $this->allowSelfSigned = $allowSelfSigned;
    }

    /**
     * @return bool
     * @psalm-mutation-free
     */
    public function isVerifyPeer(): bool
    {
        return $this->verifyPeer;
    }

    /**
     * @return bool
     * @psalm-mutation-free
     */
    public function isVerifyPeerName(): bool
    {
        return $this->verifyPeerName;
    }

    /**
     * @return bool
     * @psalm-mutation-free
     */
    public function isAllowSelfSigned(): bool
    {
        return $this->allowSelfSigned;
    }
}
