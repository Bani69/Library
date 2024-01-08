// <!--  <div>-->
// <!--  <a href=" https://ro.ecu.edu.au/ajte/">  Teacher Education</a>-->
// <!--  <a href=" https://www.mecs-press.org/ijmecs/">  Electronic Journals for Science and Mathematics Education</a>-->
// <!--  <a href=" https://www.ccsenet.org/journal/index.php/elt">International Journal of Modern Education and Computer Science   </a>-->
//
// <!--  <a href=" https://nsuworks.nova.edu/tqr/"> Qualitative Research </a>-->
// <!--  <a href= "https://nsuworks.nova.edu/tqr/"> English Language Teaching </a>-->
// <!-- <a href=" https://docs.lib.purdue.edu/ijpbl/">International Journal of Instruction</a>-->
// <!-- <a href=" https://www.ccsenet.org/journal/index.php/ies​-->
// <!--  ​​">Journal of Classroom Research in Literacy</a>-->
// <!-- <a href=" https://www.e-iji.net/">Qualitative Sociology Review </a>-->
// <!--  <a href=" https://jcrl.library.utoronto.ca/index.php/jcrl/article/view/36254-->
// <!--  ​​">Journal for Religion, Film and Media</a>-->
// <!-- <a href=" http://www.qualitativesociologyreview.org/ENG/archive_eng.php">Journal of Physical Education and Sports </a>-->
// <!--  <a href=" https://unipub.uni-graz.at/jrfm"> Journal of Special Education and Rehabilition</a>-->
// <!--  <a href=" http://efsupit.ro/">  Research in Sport and Physical Activity</a>-->
// <!--  <a href=" http://jser.fzf.ukim.edu.mk/​-->
// <!--  ​​"> Journal of Case Studies in Accreditation and Assessment</a>-->
// <!-- <a href=" https://digitalis.uc.pt/pt-pt/revista?id=107787&sec=5">Asian Social Science</a>-->
// <!-- <a href=" https://www.ccsenet.org/journal/index.php/">Journal of Sport and Health Science </a>-->
// <!--  <a href=" http://www.aabri.com/jcsaa.html"> Journal of Social Science Education </a>-->
// <!-- <a href=" https://www.sciencedirect.com/journal/journal-of-sport-and-health-science/vol/9/issue/6-->
// <!--  ​​​​​"> Social Science and Humanities</a>-->
// <!--  <a href=" https://www.jsse.org/index.php/jsse/issue/archive"> Environmental Advances </a>-->
// <!--  </div>-->

var str = "aHell"
var char = "o";
var newa=str.indexOf(char)

console.log(newa)
// var index = str.indexOf(char);
//
// if (index >= -2) {
//     console.log("The character '" + char + "' was found at an index greater than or equal to 1");
// } else {
//     console.log("The character '" + char + "' was either not found or found at an index less than 1");
// }









"ebooksearch.php"
"addebooks.php"
"ebooksearch.php"

function Queryall(url1,url2) {
    $.ajax({
        type: "POST",
        url: url1,
        data: {},
        cache: false,
        success: function (data) {
            $('#tablebody').html(data)

            $('#totalofebook').text($('#tablebody tr').length)
        }

    })

    $('#link').css('display', 'none');
    $('#Addbtn').on('click', function () {


        var addbookdata = $('#addbookform').serialize();
        if ($('#title') && $('#description') && $('#date').val() !== "") {


            var imageUrl = $('#imageurl').val();
            var description = $('#description').val();
            var title = $('#title').val();

            $.ajax({
                url: url2,
                type: "POST",
                data: {

                    imageurl: imageUrl,
                    description: description,
                    title: title
                },

                beforeSend: function () {
                    $('.parentloader').css('display', 'flex');
                },
                success: function (allbookdata) {

                    $.ajax({
                        url:url1 ,
                        type: "POST",
                        data: {},
                        cache: false,
                        success: function (allbookdata) {
                            $('#tablebody').html(allbookdata)

                            $('#totalofebook').text($('#tablebody tr').length)
                        }


                    })
                    $('.parentloader').css('display', 'none');

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






















