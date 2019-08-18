<?php

function slices($number, $length)
{
    $arr = [];
    $digits= str_split($number);
    if($length>sizeof($digits) || $length==0) {
        throw new Exception();
    }
    for($i=0;$i<sizeof($digits); $i++) {
        if($i+$length<=sizeof($digits)) {
            $arr[]=implode("", array_slice($digits, $i, $length));
        }
    }
    return $arr;


}
