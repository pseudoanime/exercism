<?php

function acronym(string $longName=null) {
    preg_match_all("/([A-Z][a-z]+)|( \w+)|(-?\w*)/u", $longName, $matches);
    $wordArray = $matches[0];
    if(sizeof($wordArray)==1) {
        return;
    }
    return implode( array_map(function($word) {
        if(strlen($word))
            return mb_strtoupper(mb_substr(str_replace("-","",trim($word)),0,1));
    }, $wordArray));
}
