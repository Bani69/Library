<?php
include "connection.php";

class fetch extends database{
    public function fetch()
    {
        $fetchall = $this->connection()->prepare("SELECT * FROM ebook_cat ");
        if (!$fetchall->execute()) {
            $fetchall = null;
        }
        $get = $fetchall->fetchAll(PDO::FETCH_OBJ);
        header("Content-Type: application/json");
        echo json_encode($get);
    }

}
$fetchall=new fetch();
$fetchall->fetch();

?>