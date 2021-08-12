<?php


class Student{

    private $id;
    private $fname = "";
    private $lname = "";
    private $email = "";
    private $pass = "";
    private $img = "";
    private $valid;


    function __construct()
    {
        require_once('validation.php');
        $this->valid = new validation();
    }


    function __set($name, $value)
    {
        $this->$name = $this->valid->validateData($name, $value);
    }


    function __get($name)
    {
        return $this->$name;
    }

    function getErrors()
    {
        return $this->valid->getErrors();
    }
}
