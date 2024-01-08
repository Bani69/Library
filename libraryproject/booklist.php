<?php
include "connection.php";

class fetchids extends database{
    public function fetchid($id)
    {
        $fetchall = $this->connection()->prepare("SELECT * FROM ebook WHERE catID=?  ");
        if (!$fetchall->execute(array($id))) {
            $fetchall = null;
        }
        $get = $fetchall->fetchAll(PDO::FETCH_OBJ);
        header("Content-Type: application/json");
        echo json_encode($get);
    }

}


$id=$_POST['id'];
$fetchall=new fetchids();
$fetchall->fetchid($id);

?>
