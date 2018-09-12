<?php
require_once 'array-helper.php';

class StringHelper {
    public static function split(string $argument1): array {
        $variable1 = preg_split('//u', $argument1);
        $variable2 = ArrayHelper::shift($variable1);
        $variable3 = ArrayHelper::pop($variable2);
        return $variable3;
    }

    public static function length(string $argument1): int {
        return count(StringHelper::split($argument1));
    }

    public static function is_space(string $argument1): bool {
        return preg_match('/[\x{0020}]/u', StringHelper::split($argument1)[0]);
    }

    public static function is_chinese(string $argument1): bool {
        return preg_match('/[\x{4e00}-\x{9fff}]/u', StringHelper::split($argument1)[0]);
    }

    public static function is_english(string $argument1): bool {
        return preg_match('/[A-Za-z]/u', StringHelper::split($argument1)[0]);
    }

    public static function is_number(string $argument1): bool {
        return preg_match('/[0-9]/u', StringHelper::split($argument1)[0]);
    }

    public static function is_special_character(string $argument1): bool {
        return preg_match('/[\x{0020}-\x{007f}\x{3000}-\x{303f}]/u', StringHelper::split($argument1)[0]);
    }
}
