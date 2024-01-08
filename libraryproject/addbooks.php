<?php
include "connection.php";


class  Add extends database
{
    private $image;

    private $title;
    private $description;

private $date;
    public function __construct($image, $title, $description, $link)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;

    }

    public function Adddata()
    {
              $adddata=$this->connection()->prepare("INSERT INTO journal (journalname, description, url, imageurl) VALUES(?,?,?,?);");
                 if($adddata->execute(array($this->title, $this->description,$this->link,$this->image))){
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

  $adddata = new Add($image, $title, $description, $link);

  $adddata->Adddata();


}

?>



