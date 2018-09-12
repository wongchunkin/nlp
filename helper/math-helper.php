<?php

class MathHelper {
    public static function sigmoid(float $argument1): float {
        return 1 / (1 + exp(-$argument1));
    }

    public static function relu(float $argument1): float {
        return max(0, $argument1);
    }

    public static function leaky_relu(float $argument1, float $argument2 = 0.01): float {
        return max($argument1, $argument2 * $argument1);
    }

    public static function dot_product(array $argument1, array $argument2): float {
        $variable1 = 0;
        $variable2 = count($argument1);
        $variable3 = count($argument2);
        for ($i = 0; $i < $variable2; $i++) {
            $variable1 = $variable1 + $argument1[$i] * $argument2[$i];
        }
        return $variable1;
    }
}
