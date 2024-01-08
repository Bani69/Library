<?php

include "connection.php";

class Delete extends database
{


    public function delete($data)
    {


        $delete = $this->connection()->prepare("DELETE FROM journal WHERE journalID=?");
        if (!$delete->execute(array($data))) {
            $delete = null;

        }
        else{

            echo json_encode(array('status' => 'deleted'));
        }
    }
}


$delete= new Delete();
if (isset($_POST['ID'])) {
    $delete->delete($_POST['ID']);

}


?>