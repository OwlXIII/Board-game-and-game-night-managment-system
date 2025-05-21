<?php

namespace App\Support;
class Constants
{
    public const MAX_PLAYERS = 30;
    public const MIN_PLAYERS = 1;
    public const MAX_DURATION = 500;
    public const MIN_DURATION = 5;

    /**
     * Returns all constants
     *
     * @return array
     */
    public static function getConstants(): array
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }
}
