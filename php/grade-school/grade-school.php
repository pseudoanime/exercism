<?php

class School
{
    protected $students = [];

    public function add($name, $grade)
    {
        $this->students[$grade][] = $name;
        sort($this->students[$grade]);
        asort($this->students);
    }

    public function grade($grade)
    {
        if (array_key_exists($grade, $this->students)) {
            return $this->students[$grade];
        }
    }

    public function studentsByGradeAlphabetical()
    {
      return $this->students;
    }
}
