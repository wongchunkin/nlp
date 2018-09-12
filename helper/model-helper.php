<?php
require_once 'array-helper.php';

class ModelHelper {
    public static function one_hot_encode(array $argument1): array {
        $variable1 = array();
        $variable2 = ArrayHelper::unique(ArrayHelper::concat($argument1));
        $variable3 = count($argument1);
        $variable4 = count($variable2);
        for ($i = 0; $i < $variable3; $i++) {
            $variable5 = array();
            for ($j = 0; $j < $variable4; $j++) {
                array_push($variable5, ArrayHelper::frequency($argument1[$i], $variable2[$j]));
            }
            array_push($variable1, $variable5);
        }
        return $variable1;
    }

    public static function n_gram(array $argument1, int $argument2): array {
        $variable1 = array();
        $variable2 = count($argument1) - $argument2;
        for ($i = 0; $i <= $variable2; $i++) {
            $variable3 = '';
            for ($j = 0; $j < $argument2; $j++) {
                $variable3 = $variable3 . $argument1[$i + $j];
            }
            array_push($variable1, $variable3);
        }
        return $variable1;
    }

    public static function term_frequency(array $argument1): array {
        $variable1 = array();
        $variable2 = count($argument1);
        for ($i = 0; $i < $variable2; $i++) {
            $variable3 = array();
            $variable4 = count($argument1[$i]);
            for ($j = 0; $j < $variable4; $j++) {
                array_push($variable3, $argument1[$i][$j] / ArrayHelper::sum($argument1[$i]));
            }
            array_push($variable1, $variable3);
        }
        return $variable1;
    }

    public static function inverse_document_frequency(array $argument1): array {
        $variable1 = array();
        $variable2 = count($argument1);
        $variable3 = count($argument1[0]);
        for ($i = 0; $i < $variable3; $i++) {
            $variable4 = 0;
            for ($j = 0; $j < $variable2; $j++) {
                if ($argument1[$j][$i] > 0) {
                    $variable4++;
                }
            }
            array_push($variable1, log10($variable2 / $variable4));
        }
        return $variable1;
    }

    public static function term_frequency_inverse_document_frequency(array $argument1): array {
        $variable1 = array();
        $variable2 = ModelHelper::term_frequency($argument1);
        $variable3 = ModelHelper::inverse_document_frequency($argument1);
        $variable4 = count($variable2);
        $variable5 = count($variable3);
        for ($i = 0; $i < $variable4; $i++) {
            $variable6 = array();
            for ($j = 0; $j < $variable5; $j++) {
                array_push($variable6, $variable2[$i][$j] * $variable3[$j]);
            }
            array_push($variable1, $variable6);
        }
        return $variable1;
    }
}
