<?php

function prime($n) {
    $num=0; $j=2;
    while($num<$n) {
        $prime = true;
        for($k=2;$k<$j;$k++) {
            if($j%$k==0) {
              $prime =false;
              break;
            }
        }
        if($prime) {
            $num++;
            if($num==$n) {
                return $j;
            }
        }
        $j++;
    }
}