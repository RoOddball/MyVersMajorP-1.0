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
        $eventQuery = '"%'.$query.'%"';
        $query = 'fighterName like "%' . str_replace(' ','%" or fighterName like"%',$query) . '%"';
        //$fighterSearch =  mysqli_query($conn,"select id from fighter where fighterName LIKE CONCAT('%','$query','%')");
        $fighterSearch = mysqli_query($conn,"select id from fighter where $query");
        $singleFighterSearch = mysqli_query($conn,"select id from fighter where fighterName like $eventQuery");
        //var_dump(mysqli_fetch_array($singleFighterSearch)[0]);
        //print '<br>';
        //var_dump(mysqli_fetch_array($fighterSearch)[0][0]);

        if(mysqli_fetch_array($fighterSearch)[0][0]) {
            $fighterId = mysqli_fetch_array($fighterSearch);
            $singleFighterId = mysqli_fetch_array($singleFighterSearch)[0];
            $eventSearchResult = mysqli_query($conn, "select eventName,venue,fighterRed,fighterBlue,eventDate,result,
            way from event where fighterRed=$fighterId[0] or fighterBlue=$fighterId[0]");

            if($singleFighterId){

                $eventSearchResult = mysqli_query($conn,"select eventName,venue,fighterRed,fighterBlue,eventDate,result,
                way from event where fighterRed=$singleFighterId or fighterBlue=$singleFighterId");
                //var_dump($eventSearchResult);
            }elseif(!$fighterId){

                $fighterId = mysqli_fetch_all($fighterSearch);

                $fighterIdStringRed = '';
                $fighterIdStringBlue = '';

                for ($i = 0; $i < count($fighterId); $i++)
                    if ($i == 0) {
                        $fighterIdStringRed = $fighterIdStringRed . $fighterId[$i][0];
                        $fighterIdStringBlue = $fighterIdStringBlue . $fighterId[$i][0];
                    } else {
                        $fighterIdStringRed = $fighterIdStringRed . ' or fighterRed = ' . $fighterId[$i][0];
                        $fighterIdStringBlue = $fighterIdStringBlue . ' or fighterBlue = ' . $fighterId[$i][0];
                    }
                //print'<br>';
                //var_dump($fighterIdStringRed);
                $eventSearchResult = mysqli_query($conn, "select eventName,venue,fighterRed,fighterBlue,eventDate,result,
            way from event where (fighterRed=$fighterIdStringRed) and (fighterBlue=$fighterIdStringBlue)");
            }
        } else {
            $eventSearchResult = mysqli_query($conn, "select eventName, venue, fighterRed, fighterBlue, eventDate, result, way 
            from event where eventName like $eventQuery");

        }
        return $eventSearchResult;
    }

//    public function insertObjectIntoTable($object,$table ){
//
//        $conn = $this->databaseSpecs->getConn();
//        $result = mysqli_query($conn,"select * from ".$table." where id = 1");
//        $columns = mysqli_fetch_array($result);
//        $keys = array_keys($columns);
//        array_unique(array_unique($keys));
//        $values = $object->__toArray();
//
//        $j=0;
//        $i=0;
//
//        foreach($keys as $key):
//
//            if($j>2 && $j%2>0) {
//
//                if($j==3) {
//
//                    mysqli_query($conn, "insert into " . $table . "( " . $key . ") values('$values[$i]')");
//                    $id=mysqli_query($conn,"select id from ".$table." where ".$key." like '$values[$i]'" );
//                    $i++;
//                }else{
//
//                    $id=mysqli_query($conn,"select id from ".$table." where ".$keys[3]." like '$values[0]'" );
//                    //mysqli_query($conn,"update ".$table." set ".$key." ='$values[$i]' where id=".mysqli_fetch_array($id)[0]);
//                   // mysqli_query($conn,"update ".$table." set ".$key." =coalesce(".$key.",'$values[$i]' where id=".mysqli_fetch_array($id)[0]);
//                      mysqli_query($conn,"update ".$table." set  ".$key."=coalesce(".$key.",'$values[$i]') where id=".mysqli_fetch_array($id)[0]);
//                    $i++;
//                }
//            }
//            print'<br>';
//            $j++;
//            endforeach;
//
//
//    }

    public function searchFighterStats($fighterId){

        $conn = $this->databaseSpecs->getConn();
        $result = mysqli_query($conn,"select fighterName,weight,height,p4vRank,nationality,win,loss,draw,dateOfBirth from fighter where id=$fighterId");
        return $result;
    }
    public function searchForumTopics(){

        $conn = $this->databaseSpecs->getConn();
        $result = mysqli_query($conn,"select * from forumTopic");
        return $result;
    }

    public function searchTopicByTitle($topicTitle){

        $conn = $this->databaseSpecs->getConn();
        //var_dump(mysqli_fetch_all(mysqli_query($conn,"select * from forumTopic where name like '$topicTitle'")));
        $result = mysqli_fetch_all(mysqli_query($conn,"select * from forumTopic where name like '$topicTitle'"))[0][0];
        return $result;
    }

    public function searchForumComments($topicId){

        $conn = $this->databaseSpecs->getConn();
        $result = mysqli_query($conn,"select * from comment where topicId = $topicId" );
        return $result;
    }

    public function storeComment($topicId,$nickName,$commentContent,$dateAndTime){

        $conn = $this->databaseSpecs->getConn();
        mysqli_query($conn,"insert into comment (topicId,userName,content,dateAndTime) values($topicId, '$nickName','$commentContent','$dateAndTime')");
    }

    public function insertObjectIntoTable($object,$table){

        $conn = $this->databaseSpecs->getConn();
        //$columnNames = mysqli_query($conn,"SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'$table'");

        $columnNamesQuery = mysqli_query($conn,"SELECT column_name, data_type, character_maximum_length, table_name,ordinal_position, is_nullable 
FROM information_schema.COLUMNS WHERE table_name LIKE '$table'
ORDER BY ordinal_position");
        $columnArray = [];
        $columnNames = $columnNamesQuery->fetch_all();
        foreach($columnNames as $columnName):
            array_push($columnArray,$columnName[0]);
        endforeach;

        $k=1;
        $j=0;
        $columnsString = '';
        for($i=1;$i<count($columnArray);$i++){
            if($k==1)
                $columnsString = $columnsString . $columnArray[$i];
            else
                $columnsString = $columnsString .', '. $columnArray[$i];
            $k++;
        }
        var_dump($columnsString);
        $valuesString = '';
        $objectArray = $object->__toArray();
        for($i=0;$i<count($objectArray);$i++){
            if($j==0)
                $valuesString =$valuesString . "'" . $objectArray[$i] . "'";
            else
                $valuesString = $valuesString  . ', '. "'" .$objectArray[$i]."'" ;
            $j++;
        }
        var_dump($valuesString);
        mysqli_query($conn,"insert into " . $table . " ( " . $columnsString . ") values(". $valuesString .")");
    }
}