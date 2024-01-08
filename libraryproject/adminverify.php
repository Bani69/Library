<?php

include "connection.php";

session_start();
class admin extends database
{
    public function adminverify($username, $password)
    {
        $fetchadmin = $this->connection()->prepare("SELECT * FROM admin WHERE  password = ? AND username=? ");
        if (!$fetchadmin->execute(array($password, $username))) {
            $fetchadmin = null;
        }
        if ($fetchadmin->rowCount() == 1) {
            $fetchadmin->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['admin']="valid";

            $response = array('status' => 'valid');


        } else {
            $response = array('status' => 'invalid');

            session_destroy();
        }
        echo json_encode($response);
    }
}


$fetchadmin = new admin();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $username = $_POST['uname'];
    $password = $_POST['password'];
    $fetchadmin->adminverify($username, $password);


}






?>