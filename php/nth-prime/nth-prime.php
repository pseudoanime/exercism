<?php

function prime($n)
{
    if ($n == 1) {
        return 2;
    }
    $num = 1;
    $j = 3;
    while ($num < $n) {
        $prime = true;
        for ($k = 3; $k < $j; $k += 2) {
            if ($j % $k == 0) {
                $prime = false;
                break;
            }
        }
        if ($prime) {
            $num++;
            if ($num == $n) {
                return $j;
            }
        }
        $j += 2;
    }
}