<?php

use Carbon\Carbon;

class clock
{
    protected $time;

    public function __construct()
    {
        $args = func_get_args();
        $time = Carbon::today()->addHours($args[0])->addMinutes($args[1] ?? 0)->format("H:i");
        $this->time = Carbon::today()->setTimeFromTimeString($time);
    }

    public function add($minute)
    {
        $this->time->addMinutes($minute);

        return $this;
    }

    public function sub($minute)
    {
        $this->time->subMinutes($minute);

        return $this;
    }

    public function __toString()
    {
        return $this->time->format("H:i");
    }

}