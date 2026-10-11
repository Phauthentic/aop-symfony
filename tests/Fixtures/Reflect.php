<?php

declare(strict_types=1);

namespace Phauthentic\AOP\Symfony\Tests\Fixtures;

final class Reflect
{
    /**
     * @param class-string $class
     *
     * @return \ReflectionClass<object>
     */
    public static function cls(string $class): \ReflectionClass
    {
        return new \ReflectionClass($class);
    }
}
