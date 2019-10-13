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
     */
    private $verifyPeer;

    /**
     * @var bool
     */
    private $verifyPeerName;

    /**
     * @var bool
     */
    private $allowSelfSigned;

    /**
     * Security constructor.
     *
     * @param null|bool $verifyPeer
     * @param null|bool $verifyPeerName
     * @param null|bool $allowSelfSigned
     */
    public function __construct(?bool $verifyPeer = true, ?bool $verifyPeerName = true, ?bool $allowSelfSigned = false)
    {
        $this->verifyPeer = $verifyPeer;
        $this->verifyPeerName = $verifyPeerName;
        $this->allowSelfSigned = $allowSelfSigned;
    }

    /**
     * @return bool
     */
    public function isVerifyPeer(): bool
    {
        return $this->verifyPeer;
    }

    /**
     * @return bool
     */
    public function isVerifyPeerName(): bool
    {
        return $this->verifyPeerName;
    }

    /**
     * @return bool
     */
    public function isAllowSelfSigned(): bool
    {
        return $this->allowSelfSigned;
    }
}
