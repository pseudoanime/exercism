<?php

function encode($input)
{
    $letters = str_split($input);
    $encoding = "";
    $queue = [];
    for ($i = 0; $i < sizeof($letters); $i++) {
        if ($i == 0) {
            $queue[$letters[$i]] = 1;
        } else {
            if ($letters[$i] == $letters[$i - 1]) {
                $queue[$letters[$i]]++;
            } else {
                $encoding .= extractencoding($queue);
                array_shift($queue);
                $queue[$letters[$i]] = 1;
            }
        }
    }
    $encoding .= extractEncoding($queue);
    return $encoding;

}

/**
 * @param array $queue
 * @param array $letters
 * @param int $i
 * @param string $encoding
 * @return string
 */
function extractEncoding(array $queue): string
{
    $enc = "";
    $key = array_keys($queue)[0];
    if ($queue[$key] == 1) {
        $enc .= $key;
    } else {
        $enc .= $queue[$key] . $key;
    }
    return $enc;
}

function decode($input)
{
    $decodeString = str_split($input);
    $decode = "";
    $num = 0;
    for ($i = 0; $i < sizeof($decodeString); $i++) {
        if (is_numeric($decodeString[$i])) {
            if ($num == 0) {
                $num = $decodeString[$i];
            } else {
                $num = $num * 10 + $decodeString[$i];
            }
        } else {
            if ($num == 0) {
                $decode .= $decodeString[$i];
            } else {
                $decode .= str_repeat($decodeString[$i], $num);
                $num = 0;
            }
        }

    }

    return $decode;
}
