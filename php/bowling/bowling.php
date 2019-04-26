<?php

class Game {

    protected $no_of_throws=0;

    protected $throws = [];

    public function roll(int $pins)
    {
        array_push($this->throws, $pins);
    }

    public function score()
    {
        $score=0;
        $next=0;
        for($i=0;$i<count($this->throws);$i+=2) {
            for ($j=$i; $j < $i+2; $j++) {
                $k=1;
                if($next>0) {
                    $k=2;
                }
                $score+=$this->throws[$j]*$k;
                if ($this->throws[$j] >= 10) {
                    if ($i%2 == 0) {
                        $next++;
                    }
                    $next++;
                }
            }

        }

        return $score;
    }


}