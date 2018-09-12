<?php
require_once 'string-helper.php';
require_once 'array-helper.php';
require_once 'model-helper.php';

class TransformHelper {
    public static function tokenize(string $argument1): array {
        $variable1 = array();
        $variable2 = StringHelper::split(TransformHelper::normalize($argument1));
        $variable3 = count($variable2);
        for ($i = 0; $i < $variable3; $i++) {
            if (StringHelper::is_english($variable2[$i])) {
                if (count($variable1) > 0 && $i > 0 && StringHelper::is_english($variable2[$i - 1])) {
                    $variable1[count($variable1) - 1] = $variable1[count($variable1) - 1] . $variable2[$i];
                } else {
                    array_push($variable1, $variable2[$i]);
                }
            } else if (StringHelper::is_number($variable2[$i])) {
                if (count($variable1) > 0 && $i > 0 && StringHelper::is_number($variable2[$i - 1])) {
                    $variable1[count($variable1) - 1] = $variable1[count($variable1) - 1] . $variable2[$i];
                } else {
                    array_push($variable1, $variable2[$i]);
                }
            } else if (StringHelper::is_chinese($variable2[$i])) {
                array_push($variable1, $variable2[$i]);
            } else if (StringHelper::is_special_character($variable2[$i]) && StringHelper::is_space($variable2[$i]) === false) {
                array_push($variable1, $variable2[$i]);
            }
        }
        return $variable1;
    }

    public static function normalize(string $argument1): string {
        return strtolower($argument1);
    }

    public static function vectorize(array $argument1): array {
        $variable1 = array();
        $variable2 = count($argument1);
        for ($i = 0; $i < $variable2; $i++) {
            $variable3 = array();
            array_push($variable3, ModelHelper::n_gram(TransformHelper::tokenize($argument1[$i]), 1));
            array_push($variable3, ModelHelper::n_gram(TransformHelper::tokenize($argument1[$i]), 2));
            array_push($variable3, ModelHelper::n_gram(TransformHelper::tokenize($argument1[$i]), 3));
            array_push($variable1, ArrayHelper::concat($variable3));
        }
        return ModelHelper::one_hot_encode($variable1);
    }
}
