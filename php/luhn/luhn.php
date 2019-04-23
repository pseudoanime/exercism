<?php

function isValid($number)
{
    $number = str_replace(' ','', $number);

    if(!preg_match( '/^\d{2,}$/', $number)){
        return false;
    }

    $number_arr = str_split( $number);

    for ($i=sizeof($number_arr),$k=0; $i>0 ; $i--,$k++) {
        if($k%2==1) {
            $number_arr[$i-1]*=2;
            if( $number_arr[$i-1]>9) {
                $number_arr[$i-1] -= 9;
            }
        }
    }

    $sum= array_sum($number_arr);

    return $sum%10==0;
}
