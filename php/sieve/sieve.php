<?php

function sieve(int $number)
{
    $arr = [];

    for ($i=2; $i <= $number; $i++) {
        $arr[$i] = true;
    }

    foreach ($arr as $key => $value) {
        for ($i=2; $i <= $number/$key; $i++) {
            $arr[$key*$i] = false;
        }
    }

    return array_keys(array_filter($arr, function($v, $k) {
        return $v==true;
    }, ARRAY_FILTER_USE_BOTH));
}