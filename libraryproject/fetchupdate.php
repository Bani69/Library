<?php
include "connection.php";

class fetchupdate extends database
{


    private $image;
    private $title;
    private $description;
    private $link;
    private $id;

    public function __construct($title, $description, $link, $image, $id)

    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->id = $id;
    }

    public function update()
    {
        $update = $this->connection()->prepare("UPDATE journal SET journalname=?, description=?,url=?, imageurl=? WHERE journalID=?");
        if ($update->execute(array($this->title, $this->description, $this->link, $this->image, $this->id))) {
            echo json_encode(array('statuss' => 'update'));

        }


    }


}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image = $_POST['imageurl'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $link = $_POST['link'];
    $id = $_POST['ID'];
    $edit = new fetchupdate($title, $description, $link, $image, $id);
    $edit->update();
}
?>


