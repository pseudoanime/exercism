<?php

function detectAnagrams($word, $anagrams)
{
    $ana=[];
    $anagrams = array_diff(array_unique($anagrams), [$word]);
    foreach ($anagrams as $anagram) {
        if((!in_array(strtolower($anagram), array_map('strtolower', $ana))) && (strtolower($word) !== strtolower($anagram))) {
            $worda = count_chars_unicode($word, 1);
            $anagram1 = count_chars_unicode($anagram, 1);
            if ($worda == $anagram1) {

                array_push($ana, $anagram);
            }
        }
    }

    return $ana;
}

function count_chars_unicode($string)
{
   $string = mb_strtolower($string);

   $arr = array_unique((preg_split('//u', $string, null, PREG_SPLIT_NO_EMPTY)));

   $arr = array_flip($arr);

   foreach ($arr as $key=>$char) {
       $arr[$key] = mb_substr_count($string, $key);
   }
   return $arr;
}