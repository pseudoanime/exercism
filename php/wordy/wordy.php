<?php

function calculate($string)
{
    if( !preg_match('/(\d|plus)/', $string) || (!preg_match('/(plus|minus|multiplied|divided)/', $string))) {
        throw new InvalidArgumentException();

    }
    $orig = trim(trim(strtolower($string), "what is"),"?");

   return Calculation::make()->calculate($orig);
}

class Calculation {

    protected $result;

    public static function make()
    {
        return new static;
    }

    public function __toString()
    {
        return (string)$this->result;
    }

    public function calculate($string)
    {

        preg_match_all('/(\+|\-)?\d{1,}/', $string, $operands);
        $operands = $operands[0];
        $this->result = $operands[0];

        $operators = array_map('trim',array_filter(preg_split( '/(\+|\-)?\d{1,}/', $string),function($v) {
            return strlen($v)>0;
        }, ARRAY_FILTER_USE_BOTH));

        $next=1;
       foreach ($operators as $operator) {
           $operator=str_replace(" ","",$operator);
            $this->$operator($operands[$next]);
            $next++;
       }

       return $this->result;
    }

    public function plus($value)
    {
        $this->result+=$value;
    }

    public function minus($value)
    {
        $this->result -= $value;
    }

    public function multipliedby($value)
    {
        $this->result *= $value;
    }

    public function dividedby($value)
    {
        $this->result/=$value;
    }

}