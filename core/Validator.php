<?php

namespace Core;

class Validator
{
    public static function make($attributes): mixed
    {
        $validated = [];
        $failed = [];
        $is_validated = count($failed) === 0;

        return compact(
            'validated',
            'failed',
            'is_validated'
        );
    }
}
