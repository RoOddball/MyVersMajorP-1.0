<?php

require_once 'DatabaseSpecs.php';

class DatabaseHandler
{
    private $databaseSpecs;

    public function __construct()
    {
        $this->databaseSpecs = new DatabaseSpecs();
    }

    public function insertUser($username,$password,$address){

        $conn = $this->databaseSpecs->getConn();
        mysqli_query($conn,"insert into user(username,password,address,acctype) values ('$username','$password','$address','regular' )");
    }

    public function searchUser($username){

        $conn = $this->databaseSpecs->getConn();
      $search[] = mysqli_query($conn,"select * from user where username like '$username'");
      return $search;
    }

    public function searchForHomeBar($querry){

        $conn = $this->databaseSpecs->getConn();
        $rawSearch[] =  mysqli_query($conn,"select * from fighter where fighterName LIKE CONCAT('%','$querry','%')");
        //var_dump(mysqli_fetch_array($rawSearch[0])[1]);

    //    if(isEmpty($search)){
//
 //           $search [] = mysqli_query($conn,"select event.eventName, event.venue, fighter.fighterName from '.'
//event inner join fighter on event.fighterRed = fighter.id ") .
//                mysqli_query($conn," select fighter.fighterName,event.eventDate,event.result,event.way '.'
 //from event inner join fighter  on event.fighterBlue = fighter.id ");
 //       }
        $search = [];

        foreach($rawSearch[0] as $res):

            foreach($res as $re):
            array_push($search,$re);
            //var_dump($re);
            endforeach;
        endforeach;

        return $search;
    }
}