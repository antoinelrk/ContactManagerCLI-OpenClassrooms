<?php

namespace Core;

class Validator
{
    public static function make($attributes, $rules): mixed
    {
        /**
         *
         */
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
