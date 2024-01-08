<?php
include "connection.php";
class fetchupdate extends database
{



    public function queryupdate($fetchid){

        $update = $this->connection()->prepare("SELECT * FROM journal WHERE journalID=?");
      $update->execute(array($fetchid));

        $get=$update->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($get[0]);
    }



}
$ID=$_POST["ID"];
$fetchupdate= new fetchupdate();




$fetchupdate->queryupdate($ID)





?>