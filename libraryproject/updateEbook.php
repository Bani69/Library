<?php
include "connection.php";

class fetchebook extends database
{


    public function queryebook($fetchid)
    {

        $update = $this->connection()->prepare("SELECT * FROM ebook_cat WHERE catID=?");
        $update->execute(array($fetchid));

        $get = $update->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($get[0]);
    }


}

$ID = $_POST["ID"];
$fetchupdate = new fetchebook();


$fetchupdate->queryebook($ID)


?>