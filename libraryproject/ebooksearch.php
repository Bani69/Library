<?php
include "connection.php";

class queryall extends database
{
    public function getdata($data)
    {
        $fetchall = $this->connection()->prepare("SELECT * FROM ebook_cat WHERE  catname  LIKE ? ");
        if (!$fetchall->execute(array('' . $data . '%'))) {
            $fetchall = null;
        }
        $getall = $fetchall->fetchAll(PDO::FETCH_ASSOC);

        if ($fetchall->rowCount() >= 0) {


            foreach ($getall as $data) {
                echo '
                    <tr>
                        <td data-name=""><img src="' . $data['imageurl'] . '" alt="unkowak"></td>
                        <td data-name="Title">'  .substr($data['catname'] , 0,10 )  . '....</td>
                        <td data-name="Description">'  .substr($data['description'] , 0,18 )  . '...</td>
                       
                        <td data-name="Action">
                            <div>
                                <button class="updateebookbtn" id=' . $data['catID'].'><img src="libraryact/edit.png"></button>
                                <button class="deletebtn" id=' . $data['catID'] . '><img src="libraryact/delete.png"></button>
                                <button  class="addcat" id=' . $data['catID'] . '><img src="libraryact/add.png"></button>
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

    ebookdeleteBook()





    function ebookdeleteBook() {
        $('.deletebtn').on('click', function () {

            var ID = $(this).attr('id');

            $('.deletebody').fadeIn().css('display', 'flex');

            $('#ebookbtndelete').on('click', function () {

                $.ajax({
                    url: "ebookdelete.php",
                    method: 'POST',
                    data: {id: ID},
                    dataType:"json",
                    beforeSend: function () {


                    },

                    success: function (r) {

                        if (r.status==="delete"){
                            $('.success__title').text("Successfully Deleted")
                            $('.success').css({'background':'#df3f46','color':'#fff'});
                            $('.success').fadeIn('slow').css({'display': 'flex'});

                            $('.success').delay(2000).fadeOut('slow');
                        }


                        $.ajax({
                            url: "ebooksearch.php",
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
    $('.addcat').on('click', function () {

        var idcat =$(this).attr('id')
        $('.catform').fadeIn().css('display', 'flex');



        $('#insert').on('click', function () {
            var imageUrlcat = $('#imageurlcats').val();
            var descriptioncat = $('#descriptionebooks').val();
            var titlecat = $('#titleebooks').val();
            var linkbook=$('#linkcat').val();
            if (titlecat !== "" && descriptioncat !== "" && imageUrlcat !== " " && linkbook !=="") {
                $.ajax({
                    url: "addchildbook.php",
                    type: "POST",
                    data: {
                        link: linkbook,
                        imageurl: imageUrlcat,
                        description: descriptioncat,
                        title: titlecat,
                        ID:idcat,
                    }, dataType: "json",
                    beforeSend: function () {
                        $('.parentloader').css('display', 'flex');
                    },
                    success: function (allbookdata) {

                        if (allbookdata.status === "inserted") {

                            $('.success__title').text("Successfully Added")
                            $('.success').css({'background':'#84D65A','color':'#fff'});
                            $('.success').fadeIn('slow').css('display', 'flex');


                            $('.success').delay(2000).fadeOut('slow');
                        }
                        $('.parentloader').css('display', 'none');
                        $('#preview').attr('src', "libraryact/defoult.png")
                        $('#addbookform')[0].reset()
                    }
                });
            }
            else{

                $('#titleebooks,#descriptionebooks, #imageurlcats, #linkcat').css('border', '2px solid red')
            }
        })
    })
</script>

<script src="index2.js"></script>