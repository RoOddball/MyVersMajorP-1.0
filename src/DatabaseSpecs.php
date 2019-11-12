<?php


class DatabaseSpecs
{
private $servername = "localhost";
private $username = "root";
private $password = "pass";
private $dbname = "major1";
private $conn ;





    public function getConn(){

        $this->conn= mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        return $this->conn;
    }
}