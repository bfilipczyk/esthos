<?php


class User
{
    private $id;
    private $email;
    private $password;


    public function __construct($email, $password, $id=null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }




}