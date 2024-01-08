<?php
include "connection.php";


class  Add extends database
{
    private $image;

    private $title;
    private $description;


    public function __construct($image, $title, $description)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;


    }

    public function Adddata()
    {
        $adddata=$this->connection()->prepare("INSERT INTO ebook_cat (catname, description, imageurl) VALUES(?,?,?);");
        $adddata->execute(array($this->title, $this->description,$this->image));

        echo json_encode(array('status' => 'inserted'));

    }

}

if($_SERVER['REQUEST_METHOD'] == 'POST') {


    $image = $_POST['imageurl'];
    $imageInfo = @getimagesize($image);
    if ($imageInfo === false) {
        $image = "libraryact/defoult.png";
    }
    $title = $_POST['title'];
    $description = $_POST['description'];


    $adddata = new Add($image, $title, $description);

    $adddata->Adddata();


}

?>



