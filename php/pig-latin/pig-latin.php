<?php

function translate($words)
{
    $words = explode(" ", $words);

    $pig_latin = [];

    foreach ($words as $key => $word ) {

        if (preg_match('/^([aeiou]|yt|xr)/', $word)) {

            $pig_latin[$key]= $word . 'ay';
        } else {

            if (preg_match('/^[^aeiou]{0,}qu/', $word, $match)) {
                $match = $match[0];
            } else {
                preg_match('/^[^aeiou]{1,}[aeiou]/', $word, $match);
                $match = substr($match[0], 0, strlen($match[0]) - 1);
            }

            $pig_latin[$key]= substr($word, strlen($match), strlen($word)) . $match . "ay";
        }
    }

    return implode($pig_latin, " ");

}
