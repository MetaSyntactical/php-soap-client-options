<?php

declare(strict_types=1);

namespace MetaSyntactical\SoapClientOptions\Params;

use Assert\Assertion;

/**
 * Class Credentials.
 *
 * @internal
 */
final class Credentials
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * Credentials constructor.
     *
     * @param string $login
     * @param string $password
     *
     * @throws \Assert\AssertionFailedException
     */
    public function __construct(string $login, string $password)
    {
        Assertion::minLength(1, $login, 'Expected login to contain at least %2$s characters. Got: %s');
        Assertion::minLength(1, $password, 'Expected password to contain at least %2$s characters. Got: %s');
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
