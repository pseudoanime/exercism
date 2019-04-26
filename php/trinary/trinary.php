<?php

function toDecimal($number)
{
    if(preg_match('/[3-9]/', $number))
        return 0;

    $decimal = 0;
    for ($i=strlen($number)-1,$k=0; $i >=0 ; $i--, $k++) {
        $decimal+= (int) $number[$i]* pow(3, $k);
    }

    return $decimal;
}