
<?php
include_once "db.php";
if(isset($_POST['uname'])){
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];
    $rpword = $_POST['rpword'];

    if($pword==$rpword){
        echo "Y";



    }else{
        echo "N";
    }

}

?>
