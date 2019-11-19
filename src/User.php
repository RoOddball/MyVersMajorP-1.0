<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $address;
    private $accType;


    public function getAccType()
    {
        return $this->accType;
    }


    public function setAccType($accType)
    {
        $this->accType = $accType;
    }


    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function __toString()
    {
        return "$this->username" ." ". "$this->password"." ". "$this->address" ." ". "$this->accType";
    }
    public function __toArray(){
        return [$this->username,$this->password,$this->address,$this->accType];
    }

}