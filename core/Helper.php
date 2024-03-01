<?php

class Helper
{
    public static function reset() {
        return "\x1b[0m";
    }

    public static function type($type = null): string
    {
        // Foreground: \x1b[38;2;128;128;128m
        // Background: \x1b[48;2;200;200;200m

        return match ($type) {
            "info" => "\x1b[38;2;44;154;249m",
            "success" => "\x1b[38;2;44;249;65m",
            "warning" => "\x1b[38;2;249;215;44m",
            "error" => "\x1b[38;2;249;48;44m",
            default => "",
        };
    }

    public static function print(string $value, string $level = null): void
    {
        echo self::type($level) . $value . self::reset() . "\n";
    }
}
