<?php

class ArrayHelper {
    public static function shift(array $argument1): array {
        $variable1 = array();
        $variable2 = count($argument1);
        for ($i = 1; $i < $variable2; $i++) {
            array_push($variable1, $argument1[$i]);
        }
        return $variable1;
    }

    public static function pop(array $argument1): array {
        $variable1 = array();
        $variable2 = count($argument1) - 1;
        for ($i = 0; $i < $variable2; $i++) {
            array_push($variable1, $argument1[$i]);
        }
        return $variable1;
    }

    public static function concat(array $argument1): array {
        $variable1 = array();
        $variable2 = count($argument1);
        for ($i = 0; $i < $variable2; $i++) {
            $variable3 = count($argument1[$i]);
            for ($j = 0; $j < $variable3; $j++) {
                array_push($variable1, $argument1[$i][$j]);
            }
        }
        return $variable1;
    }

    public static function unique(array $argument1): array {
        $variable1 = array();
        $variable2 = count($argument1);
        for ($i = 0; $i < $variable2; $i++) {
            $variable3 = count($variable1);
            $variable4 = false;
            for ($j = 0; $j < $variable3; $j++) {
                if ($argument1[$i] === $variable1[$j]) {
                    $variable4 = true;
                    break;
                }
            }
            if ($variable4 === false) {
                array_push($variable1, $argument1[$i]);
            }
        }
        return $variable1;
    }

    public static function frequency(array $argument1, string $argument2): int {
        $variable1 = 0;
        $variable2 = count($argument1);
        for ($i = 0; $i < $variable2; $i++) {
            if ($argument1[$i] === $argument2) {
                $variable1++;
            }
        }
        return $variable1;
    }

    public static function sum(array $argument1): float {
        $variable1 = 0;
        $variable2 = count($argument1);
        for ($i = 0; $i < $variable2; $i++) {
            $variable1 = $variable1 + $argument1[$i];
        }
        return $variable1;
    }
}
