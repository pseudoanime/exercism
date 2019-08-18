<?php

function findFewestCoins($coins, $cR)
{
    $resultCoins = [];
    for ($i = 0; $i < sizeof($coins); $i++) {
        $changeRequired = $cR;
        while ($changeRequired > 0) {
            $coin =  get_coins(array_slice($coins, 0, $i + 1), $changeRequired);
            if($coin==0) {
                break;
            }
            $resultCoins[$i][] =$coin;
        }

    }
    usort($resultCoins, function ($a, $b) {
        return count($a)-count($b);
    })[0];
    sort($resultCoins[0]);
    return $resultCoins[0];
}

function get_coins($coins, &$changeRequired)
{
    $biggest=0;
    for ($i = 0; $i < sizeof($coins); $i++) {
        if ($coins[$i] == $changeRequired) {
            $changeRequired = 0;
            return $coins[$i];
        } elseif ($i + 1 < sizeof($coins) && $coins[$i + 1] > $changeRequired && $coins[$i] < $changeRequired) {
            $changeRequired -= $coins[$i];
            return $coins[$i];
        } elseif ($coins[$i]<$changeRequired) {
            $biggest = $coins[$i];
        }
    }
    $changeRequired-=$biggest;
    return $biggest;
}