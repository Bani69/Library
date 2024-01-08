$('#toebook').on('click', function () {
    $('.headername').text('Manage Ebooks Category')
    $('#headerfilter').html(' <th>Cover</th>' +
        '<th>Title</th>' +
        '<th>Description</th>' +
        '<th>Action</th>')
    $('.inputadd').text('Add Ebook')
    Queryall("ebooksearch.php", "addebooks.php", false)


})

//if ejournalbutton is click the ebook will load
$('#tojournal').on('click', function () {

    $('.inputadd').text('Add Journal')
    $('.headername').text('Manage Ejournals')
    $('#link').css('display', 'flex');
    $('#headerfilter').html(' <th>Cover</th>' +
        '<th>Title</th>' +
        '<th>Description</th>' +
        '<th>Linked to</th>' +
        '<th>Action</th>')

    Queryall("search.php", "addbooks.php", true)

})



function Queryall(url1, url2, formvalidate) {
    $.ajax({
        type: "POST",
        url: url1,
        data: {},
        cache: false,
        success: function (data) {
            $('#tablebody').html(data)


        }

    })
    if (formvalidate === true) {
        $('#link').css('display', 'flex');

    } else {
        $('#link').css('display', 'none');

    }

    $('#Addbtn').on('click', function () {
        var addbookdata = $('#addbookform').serialize();
        if ($('#title') && $('#description') && $('#date').val() !== "") {
            var imageUrl = $('#imageurl').val();
            var description = $('#description').val();
            var title = $('#title').val();
            var link = $('#link').val();
            $.ajax({
                url: url2,
                type: "POST",
                data: {
                    imageurl: imageUrl,
                    description: description,
                    title: title,
                    link: link,
                },
                dataType: "json",
                beforeSend: function () {
                    $('.parentloader').css('display', 'flex');
                },
                success: function (allbookdata) {
                    if (allbookdata.status === "inserted") {
                        $('.success').fadeIn('slow').css('display', 'flex');
                        $('.success').delay(2000).fadeOut('slow');
                    }
                    $.ajax({
                        url: url1,
                        type: "POST",
                        data: {},
                        cache: false,
                        success: function (allbookdata) {
                            $('#tablebody').html(allbookdata)
                        }
                    })
                    $('.parentloader').css('display', 'none');
                    $('#preview').attr('src', "libraryact/defoult.png")
                    $('#addbookform')[0].reset()
                }
            });
        } else {
            $('#title,#description, #imageurl, #link').css('border', '2px solid red')
        }


    })


    $('#search').off('keyup').on('keyup', function () {
        $.ajax({
            url: url1,
            type: "POST",
            data: {ID: $(this).val()},
            cache: false,
            success: function (allbookdata) {
                $('#tablebody').html(allbookdata)


            }
        });


    })


}

//s/qwsq




$('#Addbtn').on('click', function () {
    var addbookdata = $('#addbookform').serialize();
    if ($('#title') && $('#description') && $('#date') && $('#link').val() !== "") {
        var link = $('#link').val();
        var imageUrl = $('#imageurl').val();
        var description = $('#description').val();
        var title = $('#title').val();
        $.ajax({
            url: "addbooks.php",
            type: "POST",
            data: {
                link: link,
                imageurl: imageUrl,
                description: description,
                title: title
            }, dataType: "json",
            beforeSend: function () {
                $('.parentloader').css('display', 'flex');
            },
            success: function (allbookdata) {

                if (allbookdata.status === "inserted") {
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
                $('.parentloader').css('display', 'none');
                $('#preview').attr('src', "libraryact/defoult.png")
                $('#addbookform')[0].reset()
            }
        });
    } else {
        $('#title,#description, #imageurl, #link').css('border', '2px solid red')
    }


})