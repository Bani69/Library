


$(document).ready(function () {
    $('#closebtn').on('click', function () {
        $('.form').fadeOut();

        $('#addbookform')[0].reset();
        $('#preview').attr('src', "libraryact/defoult.png")
    })

    $('#updateclosebtn2').on('click', function () {

        $('.updateform').fadeOut();
        $('#updateebookform')[0].reset();
        $('#preview2').attr('src', "libraryact/defoult.png")
    })
    $('#modal').on('click', function () {

        $('.form').fadeIn().css('display', 'flex');
    })
    $('#addebookform,#addcat,#updateebookform').on('click', function (e) {
        e.preventDefault();

    })




    $('#closecatbtn,#cancelcatbtn').on('click', function () {

        $('.catform').fadeOut();
        $('#updateebookform')[0].reset();
        $('#preview2').attr('src', "libraryact/defoult.png")
    })


    updateebook()
    function updateebook() {

        $('.updateebookbtn').on('click', function () {
            var ID=($(this).attr('id'))


            $('.updateform').fadeIn().css('display', 'flex');
            $.ajax({
                type: "POST",
                url: "updateEbook.php",
                data: {ID: $(this).attr('id')},
                cache: false,
                dataType: "JSON",
                success: function (data) {


                    $('#title2').val(data.catname)
                    $('#preview2').attr('src', ""+data.imageurl+"")
                    $('#imageurl2').val(data.imageurl)
                    $('#description2').val(data.description)

                }

            })


            $('#updatebtn').on('click', function () {


                var imageUrl = $('#imageurl2').val();
                var description = $('#description2').val();
                var title = $('#title2').val();


                $.ajax({
                    url: "fetchupdateebook.php",
                    type: "POST",
                    data: {
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
                            url: "ebooksearch.php",
                            type: "POST",
                            data: {},
                            cache: false,
                            success: function (allbookdata) {


                                $('#tablebody').html(allbookdata)

                                $('#totalofebook').text($('#tablebody tr').length)
                            }
                        })

                        $('.updateform').fadeOut();

                        $('.parentloader').css('display', 'none');
                        $('#preview2').attr('src', "libraryact/defoult.png")
                        $('#updateebookform')[0].reset()
                    }
                });


                //
                // } else {
                //     $('#title,#description, #imageurl, #link').css('border', '2px solid red')
                // }

            })

        })
    }








    ADDBOOK()

    function ADDBOOK() {

        $('#addcat,#addebookform').on('keyup', function () {

            if ($('#titleebooks').val() === '') {
                $('#titleebooks').css('border', '2px solid red')
            } else {
                $('#titleebooks').css('border', '2px solid green')
            }
            if ($('#imageurlcats').val() === '') {
                $('#imageurlcats').css('border', '2px solid red')
            } else {
                $('#imageurlcats').css('border', '2px solid green')
            }
            if ($('#descriptionebooks').val() === '') {
                $('#descriptionebooks').css('border', '2px solid red')
            } else {
                $('#descriptionebooks').css('border', '2px solid green')
            }
            if ($('#linkcat').val() === '') {
                $('#linkcat').css('border', '2px solid red')
            } else {
                $('#linkcat').css('border', '2px solid green')
            }

        })
        $('#addcat,#addebookform').on('keyup', function () {
            if ($('#titleebook').val() === '') {
                $('#titleebook').css('border', '2px solid red')
            } else {
                $('#titleebook').css('border', '2px solid green')
            }
            if ($('#imageurlebook').val() === '') {
                $('#imageurlebook').css('border', '2px solid red')
            } else {
                $('#imageurlebook').css('border', '2px solid green')
            }
            if ($('#descriptionebook').val() === '') {
                $('#descriptionebook').css('border', '2px solid red')
            } else {
                $('#descriptionebook').css('border', '2px solid green')
            }
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