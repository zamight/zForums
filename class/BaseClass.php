<?php


class BaseClass
{

    private $z;
    public $vars = array();

    public function __construct($z)
    {
        $this->z = $z;
    }

    public function __set($index, $value)
    {
        $this->vars[$index] = $value;
    }

    public function __get($index)
    {
        return $this->vars[$index];
    }

}