<?php

class Robot
{
    const DIRECTION_NORTH = "N";
    const DIRECTION_SOUTH = "S";
    const DIRECTION_EAST = "E";
    const DIRECTION_WEST = "W";
    public $position;
    public $direction;

    /**
     * Robot constructor.
     * @param $position
     * @param $direction
     */
    public function __construct($position, $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    public function advance()
    {
        if ($this->direction == self::DIRECTION_NORTH) {
            $this->position[1]++;
        } elseif ($this->direction == self::DIRECTION_SOUTH) {
            $this->position[1]--;
        } elseif ($this->direction == self::DIRECTION_EAST) {
            $this->position[0]++;
        } else {
            $this->position[0]--;
        }
        return $this;
    }

    public function instructions($instructions)
    {
        $setInstructions = [
            'L' => 'turnLeft',
            'R' => 'turnRight',
            'A' => 'advance'
        ];
        $instructions = str_split($instructions);
        foreach ($instructions as $instruction) {
            if (array_key_exists($instruction, $setInstructions)) {
                $this->{$setInstructions[$instruction]}();
            } else {
                throw new InvalidArgumentException();
            }
        }
    }

    public function turnRight()
    {
        $this->direction = $this->turn("Right");
        return $this;
    }

    public function turnLeft()
    {
        $this->direction = $this->turn("Left");
        return $this;
    }

    public function turn($direction)
    {
        $directions = [self::DIRECTION_NORTH, self::DIRECTION_EAST, self::DIRECTION_SOUTH, self::DIRECTION_WEST];
        $current = array_search($this->direction, $directions);
        if ($direction == "Right") {
            if ($current == 3) {
                return $directions[0];
            }
            return $directions[$current + 1];
        } else {
            if ($current == 0) {
                return $directions[3];
            }
            return $directions[$current - 1];
        }
    }

    public function __toString()
    {
        return $this->direction;
    }
}