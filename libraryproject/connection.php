<?php


class  database{
    protected function connection(){
        try {

            $username="root";
            $password="";
            return new PDO("mysql:host=localhost;dbname=library2",  $username, $password);
        }
        catch (PDOException $e){
            echo "error".$e->getMessage()."<br>";
            die();


        }

    }


}

?>