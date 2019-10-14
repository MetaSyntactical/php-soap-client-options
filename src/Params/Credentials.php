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
     * @readonly
     */
    private $login;

    /**
     * @var string
     * @readonly
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
        Assertion::minLength($login, 1, 'Expected login to contain at least %2$s characters. Got: %s');
        Assertion::minLength($password, 1, 'Expected password to contain at least %2$s characters. Got: %s');
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @return string
     * @psalm-mutation-free
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     * @psalm-mutation-free
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
