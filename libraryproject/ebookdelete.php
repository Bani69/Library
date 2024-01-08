<?php

include "connection.php";

class ebookDelete extends database
{


    public function ebookdelete($data)
    {


        $delete = $this->connection()->prepare("DELETE FROM ebook_cat WHERE catID=?");
        if (!$delete->execute(array($data))) {
            $delete = null;

        }
        else{


            echo json_encode(array('status' =>'delete'));
        }

    }
}


$delete= new ebookDelete();
if (isset($_POST['id'])) {
    $delete->ebookdelete($_POST['id']);

}


?>