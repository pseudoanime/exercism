<?php

class Robot
{

    protected $name;

    public function getName()
    {
        return $this->name ??  $this->name = $this->generateUniqueName();

    }

    public function generateUniqueName()
    {
        $nameC = Name::getInstance();
        while(true) {
            $name = $this->randomAlphabet() . $this->randomAlphabet() . mt_rand(100, 999);
            if (in_array($name, $nameC->getNames(), true) == false) {
               $nameC->setName($name);
                return $name;
            }
        }
    }

    public function reset()
    {
        $this->name = null;
    }

    public function randomAlphabet()
    {
        return chr(mt_rand(65,90));
    }

}

class Name {

    private static $instance;

    protected $names=[];

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
                $class = __CLASS__;
                self::$instance = new $class();
            }
        return self::$instance;
    }

    public function getNames()
    {
        return $this->names;
    }

    public function setName($name)
    {
        array_push($this->names, $name);
    }
}