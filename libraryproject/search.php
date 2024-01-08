<?php
include "connection.php";

class queryall extends database
{
    public function getdata($data)
    {
        $fetchall = $this->connection()->prepare("SELECT * FROM journal WHERE  journalname  LIKE ? ");
        if (!$fetchall->execute(array('' . $data . '%'))) {
            $fetchall = null;
        }
        $getall = $fetchall->fetchAll(PDO::FETCH_ASSOC);

        if ($fetchall->rowCount() >= 0) {


            foreach ($getall as $data) {
                echo '
                    <tr>
                        <td data-name=""><img src="' . $data['imageurl'] . '" alt="unkowak" id="imagecover"></td>
                        <td data-name="Title">' . substr($data['journalname'] , 0, 11). '.......</td>
                        <td data-name="Description" id="limitd">' .substr($data['description'], 0, 11)  . '.......</td>
                        <td data-name="Linked to">' .substr( $data['url'] , 0, 9) . '.......</td>
                        <td data-name="Action">
                            <div>
                                <button class="editbutton" id=' . $data['journalID'] . '><img src="libraryact/edit.png"></button>
                                <button class="deletebutton" id=' . $data['journalID'] . '><img src="libraryact/delete.png"></button>
                               
                            </div>
                        </td>
                    </tr>';
            }


        }
    }
}


$queryall = new queryall();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ID'])) {
        $queryall->getdata($_POST['ID']);
    } else {
        $queryall->getdata("");
    }
}


?>
<script>


deleteBook()





    function deleteBook() {
        $('.deletebutton').on('click', function () {
            var ID = $(this).attr('id');

            $('.deletebody').fadeIn().css('display', 'flex');

            $('#deletebtn').on('click', function () {


                $.ajax({
                    url: "deletebooks.php",
                    method: 'POST',
                    data: {ID: ID},
                    dataType:"json",
                    beforeSend: function () {


                    },

                    success: function (allbookdata) {

                        if (allbookdata.status==="deleted"){
                       $('.success__title').text("Successfully Deleted")
                            $('.success').css({'background':'#df3f46','color':'#fff'});
                            $('.success').fadeIn('slow').css({'display': 'flex'});

                            $('.success').delay(2000).fadeOut('slow');
                        }


                        $.ajax({
                            url: "search.php",
                            type: "POST",
                            data: {},
                            cache: false,
                            success: function (allbookdata) {
                                $('#tablebody').html(allbookdata)
                                $('.deletebody').fadeOut().css('display', 'none');
                                $('#totalofjournal').text($('#tablebody tr').length)

                            }


                        })


                    }
                });
            })
        })



    }


</script>
<script src="index.js"></script>