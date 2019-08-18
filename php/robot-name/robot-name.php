<?php

class Robot
{

    protected $name;

    public function getName()
    {
        return $this->name ?? $this->name = $this->generateUniqueName();

    }

    public function generateUniqueName()
    {
        $nameC = Name::getInstance();
        return $nameC->generateUniqueName();
    }

    public function reset()
    {
        $this->name = null;
    }

}

class Name
{

    private static $instance;

    protected $names = [];

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class();
        }
        return self::$instance;
    }

    public function generateUniqueName()
    {
        while (true) {
            $name = $this->randomAlphabet() . $this->randomAlphabet() . mt_rand(100, 999);
            if (in_array($name, $this->getNames(), true) == false) {
                $this->setName($name);
                return $name;
            }
        }
    }

    protected function getNames()
    {
        return $this->names;
    }

    protected function setName($name)
    {
        array_push($this->names, $name);
    }

    protected function randomAlphabet()
    {
        return chr(mt_rand(65, 90));
    }
}