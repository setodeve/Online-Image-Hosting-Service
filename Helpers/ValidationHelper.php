<?php

namespace Helpers;

class ValidationHelper
{
    public static function integer($value, float $min = -INF, float $max = INF): int
    {
        $value = filter_var($value, FILTER_VALIDATE_INT, ["min_range" => (int) $min, "max_range"=>(int) $max]);
        if ($value === false) throw new \InvalidArgumentException("The provided value is not a valid integer.");
        return $value;
    }

    public static function stringObject($value): array
    {
        foreach ($value as $v) {
            $sanitized_input = filter_var($v, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($sanitized_input === false){
                throw new \InvalidArgumentException("The provided value is not a valid string.");
                exit;
            }
        }
        return $value;
    }
}