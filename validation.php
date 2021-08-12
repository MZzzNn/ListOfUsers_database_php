<?php

class validation
{
    private $error = [];
    function validateData($name, $value){

        if($name == "fname"){
            $value = $this->validateFname($value);
        }
        else if($name == "lname"){
            $value = $this->validateLname($value);
        }
        else if($name == "email"){
            $value = $this->validateEmail($value);
        }
        else if($name == "pass"){
            $value = $this->validatePass($value);
        }
        else if($name == "img"){
            $value = $this->validateImg($value['tmp_name'], $value['name']);
        }
        return $value;
    }

    function getErrors()
    {
        return $this->error;
    }

    function validateFname($fname)
    {
        $fname = $this->cleanData($fname);
        if (strlen($fname) < 3) {
            $this->error['fname'] = "* First name must be more than 3";
        }
        return $fname;
    }

    function validateLname($lname)
    {
        $lname = $this->cleanData($lname);
        if (strlen($lname) < 3) {
            $this->error['lname'] = "* Last name must be more than 3";
        }
        return $lname;
    }

    function validateEmail($email)
    {
        $email = $this->cleanData($email);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $this->error['email'] = "* Invalid Email";
        }
        return $email;
    }

    function validatePass($pass)
    {
        $pass = $this->cleanData($pass);
        if (strlen($pass) < 8) {
            $this->error['password'] = "* Password must be more than 8";
        }
        return $pass;
    }

    function validateImg($img_tmp_name, $img_name)
    {
        if (!move_uploaded_file($img_tmp_name,$img_name)) {
            $this->error['img'] = '* Select image';
        }
        return $img_name;
    }

    private function cleanData($data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        return $data;
    }
}
