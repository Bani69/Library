<?php
include "connection.php";

class fetchebookupdate extends database
{


    private $image;
    private $title;
    private $description;

    private $id;

    public function __construct($title, $description, $image, $id)

    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;

        $this->id = $id;
    }

    public function update()
    {
        $update = $this->connection()->prepare("UPDATE ebook_cat SET catname=?, description=?, imageurl=? WHERE catID=?");
        if ($update->execute(array($this->title, $this->description,$this->image, $this->id))) {
            echo json_encode(array('statuss' => 'update'));

        }


    }


}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image = $_POST['imageurl'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $id = $_POST['ID'];
    $edit = new fetchebookupdate($title, $description,  $image, $id);
    $edit->update();
}
?>


