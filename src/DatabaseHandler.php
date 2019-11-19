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

    public function searchForEvent($query){

        $conn = $this->databaseSpecs->getConn();
        $fighterSearch =  mysqli_query($conn,"select id from fighter where fighterName LIKE CONCAT('%','$query','%')");
        $fighterId=mysqli_fetch_array($fighterSearch);
        $eventSearchResult = mysqli_query($conn,"select eventName,venue,fighterRed,fighterBlue,eventDate,result,way from event where fighterRed=$fighterId[0] or fighterBlue=$fighterId[0]");

        return $eventSearchResult;
    }

    public function insertObjectIntoTable($object,$table ){

        $conn = $this->databaseSpecs->getConn();
        $result = mysqli_query($conn,"select * from ".$table." where id = 1");
        $columns = mysqli_fetch_array($result);
        $keys = array_keys($columns);
        array_unique(array_unique($keys));
        $values = $object->__toArray();

        $j=0;
        $i=0;
        //$id=0;

        foreach($keys as $key):

            if($j>2 && $j%2>0) {

                if($j==3) {

                    mysqli_query($conn, "insert into " . $table . "( " . $key . ") values('$values[$i]')");
                    $id=mysqli_query($conn,"select id from ".$table." where ".$key." like '$values[$i]'" );
                    $i++;
                }else{

                    $id=mysqli_query($conn,"select id from ".$table." where ".$keys[3]." like '$values[0]'" );
                    //mysqli_query($conn,"update ".$table." set ".$key." ='$values[$i]' where id=".mysqli_fetch_array($id)[0]);
                   // mysqli_query($conn,"update ".$table." set ".$key." =coalesce(".$key.",'$values[$i]' where id=".mysqli_fetch_array($id)[0]);
                      mysqli_query($conn,"update ".$table." set  ".$key."=coalesce(".$key.",'$values[$i]') where id=".mysqli_fetch_array($id)[0]);
                    $i++;
                }
            }
            print'<br>';
            $j++;
            endforeach;


    }

    public function searchFighterStats($fighterId){

        $conn = $this->databaseSpecs->getConn();
        $result = mysqli_query($conn,"select fighterName,weight,height,p4vRank,nationality,win,loss,draw,dateOfBirth from fighter where id=$fighterId");
        return $result;
    }
}