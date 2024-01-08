<?php
include "connection.php";


class  Addcat extends database
{
    private $image;

    private $title;
    private $description;
   private $id;
   private $link;
    public function __construct($image, $title, $description, $link,$id)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->id = $id;

    }

    public function Adddata()
    {
        $adddata=$this->connection()->prepare("INSERT INTO ebook (catID, ebookname, url, imageurl,description) VALUES(?,?,?,?,?);");
        if($adddata->execute(array($this->id,$this->title,$this->link,$this->image,$this->description))){
            echo json_encode(array('status' => 'inserted'));
        }



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
    $link = $_POST['link'];
$id = $_POST['ID'];
    $adddata = new Addcat($image, $title, $description, $link,$id);

    $adddata->Adddata();


}

?>



