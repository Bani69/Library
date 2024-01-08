<?php
if (isset($_POST['userID'])) {
    include_once "db.php";
    $userID = $_POST['userID'];
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];


    if ($userID!=0) {
        // Update query

        $sql = "UPDATE users SET username = '$uname', password = '$pword' WHERE userID = 'userID'";
    } else {
        //Insert query

        $sql = "INSERT INTO users (username, password) VALUES ('$uname', '$pword')";

    }

    if ($con->query($sql) === TRUE) {
        echo "<p style='color:green;'>Saved successfully</p>";
        # code...
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}