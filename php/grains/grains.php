<?php

function square($square)
{
    if(($square<1) || ($square>64)) {
        throw new InvalidArgumentException();
    }
    $obj = new Square();
    return number_format($obj->fetchSquareValue($square),0,'.','');
}

function total () {
    $obj = new Square();
    $sum=  number_format($obj->total(), 0,'.','');
    return bcsub($sum,'1');
}

class Square
{
    protected $results = [
        1 => 1
    ];

    public function fetchSquareValue($square)
    {
        if (in_array($square, array_keys($this->results)) == false) {
            $this->results[$square] = $this->generateSquareValue($square);
        }
        return $this->results[$square];
    }

    protected function generateSquareValue($square)
    {
        $previous = $this->fetchSquareValue($square - 1);
        return $previous * 2;
    }

    public function total()
    {
        $this->fetchSquareValue(64);
        return array_sum($this->results);
    }
}