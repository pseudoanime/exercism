<?php

function diamond($alphabet)
{
    $arr = [];
    $diamondheight = mb_ord($alphabet) - mb_ord('A');
    for ($i = $diamondheight, $j = mb_ord($alphabet); $i >= 0; $i--, $j--) {
        if ($i == 0) {
            $arr[$i] = $arr[2 * $diamondheight] = str_repeat(" ", $diamondheight) . mb_chr($j) . str_repeat(" ",
                    $diamondheight);
        } else {
            if ($i == $diamondheight) {
                $arr[$i] = mb_chr($j) . str_repeat(" ", 2 * $diamondheight - 1) . mb_chr($j);
            } else {
                $arr[$i] = $arr[2 * $diamondheight - $i] = str_repeat(" ",
                        $diamondheight - $i) . mb_chr($j) . str_repeat(" ", 2 * $i - 1) . mb_chr($j) . str_repeat(" ",
                        $diamondheight - $i);
            }
        }
    }
    ksort($arr);
    return $arr;
}
