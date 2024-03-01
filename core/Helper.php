<?php

class Helper
{
    /**
     * Reset color in console.
     *
     * @return string
     */
    public static function reset() {
        return "\x1b[0m";
    }

    /**
     * Apply color by type (info, error, warn...)
     *
     * @param $type
     * @return string
     */
    public static function type($type = null): string
    {
        // Foreground: \x1b[38;2;128;128;128m
        // Background: \x1b[48;2;200;200;200m

        return match ($type) {
            "info" => "\x1b[38;2;44;154;249m",
            "success" => "\x1b[38;2;44;249;65m",
            "warning" => "\x1b[38;2;249;215;44m",
            "error" => "\x1b[38;2;249;48;44m",
            "command" => "\x1b[38;2;249;48;44m\x1b[48;2;200;200;200m",
            default => "",
        };
    }

    /**
     * Print line in console.
     *
     * @param string $value
     * @param string|null $level
     * @return void
     */
    public static function print(string $value, string $level = null): void
    {
        echo self::type($level) . $value . self::reset() . "\n";
    }
}
