<?php

declare(strict_types=1);

namespace MetaSyntactical\SoapClientOptions\Params;

use InvalidArgumentException;
use ReflectionClass;
use ReflectionException;

/**
 * Class AbstractEnum.
 *
 * @internal
 */
abstract class AbstractEnum
{
    /**
     * @var mixed
     * @readonly
     */
    protected $value;

    /**
     * AbstractEnum constructor.
     *
     * @param mixed $value
     *
     * @throws ReflectionException
     */
    final public function __construct($value)
    {
        $c = new ReflectionClass($this);
        if (!in_array($value, $c->getConstants())) {
            throw new InvalidArgumentException();
        }
        $this->value = $value;
    }

    /**
     * @psalm-mutation-free
     *
     * @return string
     */
    final public function __toString(): string
    {
        return (string) $this->value;
    }
}
