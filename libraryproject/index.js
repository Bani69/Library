$(document).ready(function () {


    ADDBOOK()

    def()


    $('#toebook').on('click', function () {
        window.location.href="adminebook.php"


    })

    $('#imageurl').on('keyup', function () {

        $('#preview').attr('src', $(this).val())
        $('#preview').on('error', function () {

            $('#preview').attr('src', "libraryact/defoult.png")
        })

    })


    function def() {

        $('#closebtn').on('click', function () {
            $('.form').fadeOut();

            $('#addbookform')[0].reset();
            $('#preview').attr('src', "libraryact/defoult.png")
        })
        $('#modal').on('click', function () {

            $('.form').fadeIn().css('display', 'flex');
        })
        $('#updateclosebtn').on('click', function () {
            $('.updateform').fadeOut();

            $('#addbookform')[0].reset();
            $('#preview2').attr('src', "libraryact/defoult.png")
        })

        $('#addbookform').on('click', function (e) {
            e.preventDefault();

        })

        $('#deleteclosebtn,#cancelbtn').on('click', function () {
            $('.deletebody').fadeOut().css('display', 'none');

        })

    }



    function ADDBOOK() {

        $('#addbookform').on('keyup', function () {
            if ($('#title').val() === '') {
                $('#title').css('border', '2px solid red')
            } else {
                $('#title').css('border', '2px solid green')
            }
            if ($('#imageurl').val() === '') {
                $('#imageurl').css('border', '2px solid red')
            } else {
                $('#imageurl').css('border', '2px solid green')
            }
            if ($('#description').val() === '') {
                $('#description').css('border', '2px solid red')
            } else {
                $('#description').css('border', '2px solid green')
            }
            if ($('#link').val() === '') {
                $('#link').css('border', '2px solid red')
            } else {
                $('#link').css('border', '2px solid green')
            }

        })




    }
update()
    function update() {

        $('.editbutton').on('click', function () {
            var ID=($(this).attr('id'))


            $('.updateform').fadeIn().css('display', 'flex');
            $.ajax({
                type: "POST",
                url: "update.php",
                data: {ID: $(this).attr('id')},
                cache: false,
                dataType: "JSON",
                success: function (data) {


                    $('#title2').val(data.journalname)
                    $('#preview2').attr('src', ""+data.imageurl+"")
                    $('#imageurl2').val(data.imageurl)
                    $('#description2').val(data.description)

                    $('#link2').val(data.url)
                }

            })


            $('#updatebtn').on('click', function () {

                var link = $('#link2').val();
                var imageUrl = $('#imageurl2').val();
                var description = $('#description2').val();
                var title = $('#title2').val();









                $.ajax({
                    url: "fetchupdate.php",
                    type: "POST",
                    data: {
                        link: link,
                        imageurl: imageUrl,
                        description: description,
                        title: title,
                        ID: ID,
                    },dataType:"JSON",
                    beforeSend: function () {
                        $('.parentloader').css('display', 'flex');
                    },
                    success: function (allbookdata) {

                        if (allbookdata.statuss === "update") {
                            $('.success__title').text('Successfully Updated')
                            $('.success').fadeIn('slow').css('display', 'flex');


                            $('.success').delay(2000).fadeOut('slow');
                        }
                        $.ajax({
                            url: "search.php",
                            type: "POST",
                            data: {},
                            cache: false,
                            success: function (allbookdata) {


                                $('#tablebody').html(allbookdata)

                                $('#totalofjournal').text($('#tablebody tr').length)
                            }
                        })

                        $('.updateform').fadeOut();

                        $('.parentloader').css('display', 'none');
                        $('#preview2').attr('src', "libraryact/defoult.png")
                        $('#updatebookform')[0].reset()
                    }
                });


                //
                // } else {
                //     $('#title,#description, #imageurl, #link').css('border', '2px solid red')
                // }

            })

        })
    }



    $('#logout').on('click', function () {
        $.ajax({
            url: "logout.php",
            method: 'POST',
            data: {},
            dataType:'json',
            success: function (r){
                if (r.status==='logout'){
                    window.location.href="index.php"
                }
            }
        })

    })
})

