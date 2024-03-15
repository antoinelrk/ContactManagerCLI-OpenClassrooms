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
            "info" => self::foreground('cyan'),
            "success" => self::foreground('green'),
            "warning" => self::foreground('orange'),
            "error" => self::foreground('red'),
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

    /**
     * Return background color.
     *
     * @param string $color
     * @return string
     */
    public static function background(string $color): string
    {
        return match ($color) {
            'cyan' => "\x1b[48;2;89;189;255m",
            'green' => "\x1b[48;2;73;255;140m",
            'red' => "\x1b[48;2;255;73;73m",
            'yellow' => "\x1b[48;2;255;237;73m",
            'orange' => "\x1b[48;2;255;176;73m",
            'gray' => "\x1b[48;2;66;66;66m",
        };
    }

    /**
     * Return foreground color.
     *
     * @param string $color
     * @return string
     */
    public static function foreground(string $color): string
    {
        return match ($color) {
            'cyan' => "\x1b[38;2;89;189;255m",
            'green' => "\x1b[38;2;73;255;140m",
            'red' => "\x1b[38;2;255;73;73m",
            'yellow' => "\x1b[38;2;255;237;73m",
            'orange' => "\x1b[38;2;255;176;73m",
            'gray' => "\x1b[38;2;66;66;66m",
        };
    }

    /**
     * Set raw line to data attributes.
     *
     * @return array $attributes
     */
    public static function toObject(string $raws): array
    {
        $result = null;
        preg_match_all(REGEX, $raws, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $element = array_values(array_filter($match, fn($value) => !is_null($value) && $value !== '' && $value !== ' '));
            array_shift($element);
            $result[$element[0]] = $element[1];
        }

        return $result;
    }
}
