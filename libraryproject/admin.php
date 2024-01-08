<html>
<head>


    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body><?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location:index.php');

}


?>
<div class="success">
    <div class="success__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
            <path fill-rule="evenodd" fill="#393a37"
                  d="m12 1c-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11-4.925-11-11-11zm4.768 9.14c.0878-.1004.1546-.21726.1966-.34383.0419-.12657.0581-.26026.0477-.39319-.0105-.13293-.0475-.26242-.1087-.38085-.0613-.11844-.1456-.22342-.2481-.30879-.1024-.08536-.2209-.14938-.3484-.18828s-.2616-.0519-.3942-.03823c-.1327.01366-.2612.05372-.3782.1178-.1169.06409-.2198.15091-.3027.25537l-4.3 5.159-2.225-2.226c-.1886-.1822-.4412-.283-.7034-.2807s-.51301.1075-.69842.2929-.29058.4362-.29285.6984c-.00228.2622.09851.5148.28067.7034l3 3c.0983.0982.2159.1748.3454.2251.1295.0502.2681.0729.4069.0665.1387-.0063.2747-.0414.3991-.1032.1244-.0617.2347-.1487.3236-.2554z"
                  clip-rule="evenodd"></path>
        </svg>
    </div>
    <div class="success__title">Successfully Added</div>
</div>
<div class="deletebody">

    <div>

        <div>
            <button id="deleteclosebtn" type="button"><img src="libraryact/close.png"></button>
        </div>
        <div><h1>Do you want to Delete this Record?</h1></div>
        <div>
            <lord-icon
                    src="https://cdn.lordicon.com/qjwkduhc.json"
                    trigger="loop"
                    colors="primary:#23a559,secondary:#848484,tertiary:#ebe6ef"
                    style="width:30%;height:20vh">
            </lord-icon>
        </div>

        <div>
            <button id="cancelbtn">Cancel</button>
            <button id="deletebtn">Delete</button>
        </div>

    </div>

</div>
<h1 id="result"></h1>
<div class="form">



    <div class="parentloader">
        <div class="loader"></div>
    </div>

    <form id="addbookform">

        <div>
            <button id="closebtn" type="button"><img src="libraryact/close.png"></button>
        </div>
        <h1 id=result></h1>
        <header class="inputadd">Add Journal</header>
        <img src="libraryact/defoult.png" id="preview">

        <input type="text" id="imageurl" placeholder="Imageurl" name="imageurl">

        <input type="text" id="title" placeholder="Title" name="title">

        <input rows="5" cols="33" type="text" id="description" placeholder="Description" name="description">

        <input type="text" id="link" placeholder="Link" name="link">


        <button>Cancel</button>
        <button id="Addbtn">Add</button>

    </form>
</div>



<div class="updateform">



    <div class="parentloader">
        <div class="loader"></div>
    </div>

    <form id="updatebookform">

        <div>
            <button id="updateclosebtn" type="button"><img src="libraryact/close.png"></button>
        </div>
        <h1 id=result></h1>
        <header class="inputadd">Update journal</header>
        <img src="libraryact/defoult.png" id="preview2">

        <input type="text" id="imageurl2" placeholder="Imageurl" name="imageurl"2>

        <input type="text" id="title2" placeholder="Title" name="title2">

        <input type="text" id="description2" placeholder="Description" name="description2">

        <input type="text" id="link2" placeholder="Link" name="link2">


        <button id="updateclosebtn" >Cancel</button>
        <button id="updatebtn" type="button">Update</button>

    </form>
</div>























<sections class="parentcon">


    <section class="Section">


        <nav>
            <ul>
                <li>
                    <button><img src="libraryact/menus.png"></button>
                </li>
                <li>
                    <button><img src="libraryact/meme.jpg"></button>
                </li>
                <li>
                    <button id="tojournal" style="background: #23a559;
    border-radius: 35%;"><img src="libraryact/account.png"></button>
                </li>
                <li>
                    <button id="toebook"><img src="libraryact/categories.png"></button>

                </li>
                <li>
                    <button><img src="libraryact/book.png"></button>
                </li>

                <li>
                    <button id="logout"><img src="libraryact/power.png"></button>
                </li>
            </ul>
        </nav>


    </section>


    <section>
        <div>
            <div></div>

            <div class="total">
                <img src="libraryact/two-books.png">
                <menu>
                    <h1>Ebooks</h1>
                    <h1 id="totalofebook"></h1></menu>


            </div>
            <div><img src="libraryact/book.png">
                <menu><h1>EJournals</h1>
                    <h1 id="totalofjournal"></h1></menu>
            </div>
            <div></div>

        </div>


    </section>


    <section>
        <div>
            <nav>
                <ul>
                    <li></li>
                    <li>

                        <button type="button" class="addbutton" id="modal">
                            <span class="button__text">Add Item</span>
                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round"
                                                            stroke-linecap="round" stroke="currentColor" height="24"
                                                            fill="none" class="svg"><line y2="19" y1="5" x2="12"
                                                                                          x1="12"></line><line y2="12"
                                                                                                               y1="12"
                                                                                                               x2="19"
                                                                                                               x1="5"></line></svg></span>
                        </button>
                    </li>
                    <li>
                        <div class="seacrch-input">
                            <input type="text" placeholder="Search" name="text" class="input" id="search">
                            <svg fill="white" width="15px" height="15px" viewBox="0 0 1920 1920"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z"
                                      fill-rule="evenodd"></path>
                            </svg>
                        </div>
                    </li>


                </ul>


            </nav>
        </div>

        <div>
            <div>


                <table>


                    <thead id="headerfilter">
                    <header class="headername">Manage Ejournals</header>


                    <th>Cover</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Linked to</th>
                    <th>Action</th>
                    </thead>

                    <tbody id="tablebody">


                    </tbody>


                </table>

            </div>
        </div>

</sections>


<script>


    $(document).ready(function () {
        $('#modal').on('click', function () {

            $('.form').fadeIn().css('display', 'flex');
        })


        $.ajax({
            type: "POST",

            url: "search.php",
            data: {},
            cache: false,
            success: function (data) {


                $('#tablebody').html(data)

                $('#totalofjournal').text($('#tablebody tr').length)


            }

        })


        $('#search').off('keyup').on('keyup', function () {
            $.ajax({
                url: "search.php",
                type: "POST",
                data: {ID: $(this).val()},
                cache: false,
                success: function (allbookdata) {
                    $('#tablebody').html(allbookdata)


                }
            });


        })








if( $('#Addbtn').text()==="Add"){
console.log($('#Addbtn').text()==="Add")
    $('#Addbtn').on('click', function () {
        var addbookdata = $('#addbookform').serialize();
        var link = $('#link').val();
        var imageUrl = $('#imageurl').val();
        var description = $('#description').val();
        var title = $('#title').val();

        if (title !== "" && description !== "" && imageUrl !== "" && link !== "") {


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

                        $('.success__title').text("Successfully Added")
                        $('.success').css({'background':'#84D65A','color':'#fff'});
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

        }










        })


</script>
<script src="index.js"></script>
</body>
</html>