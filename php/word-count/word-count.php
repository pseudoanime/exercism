<?php

function wordCount($sentence)
{
    $sentence = sanitize($sentence);
    $wordArr = explode(" ", $sentence);
    $countArr = [];

    foreach (array_unique($wordArr) as $key => $uniqueword) {
        $countArr[$uniqueword] =  count(preg_grep("/^" . $uniqueword . "$/", $wordArr));
    }

    return $countArr;
}

function sanitize($sentence)
{
    return $sentence = trim(preg_replace('/( ){2,}/', ' ', preg_replace('/\s/',' ',preg_replace('/[^\w ]*/', '', strtolower($sentence)))));
}