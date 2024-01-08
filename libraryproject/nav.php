<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<header>
    <div class="header">
        <div class="imglogo">
            <img src="/libraryact/LogoWhiteSmall.webp">
        </div>
        <p class="p1">Republic Of The Philippines</p>

        <p class="p2">ILOCOS SUR POLYTECHNIC STATE COLLEGE</p>
        <p class="p3">Ilocus Sur, Philippines</p><br>
    </div>
    <div class="imagebooklogo">
        <img src="libraryact/library-book-icon-14.jpg">

    </div>
</header>
<header class="nav">
    <div class="logo">
        <p><img src="ispsclettersgreen.png" height="40" width="100"></p>
    </div>
    <input type="checkbox" id="menu" style="visibility: hidden">
    <label for="menu">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 25px; color:white;">
            <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/>
        </svg>
    </label>
    <nav class="navigation">
        <label for="menu">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="20" height="20">
                <!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/>
            </svg>
        </label>
        <ul >
            <li><a href="index.php ">HOME <span></span></a></li>
            <li><a href="aboutlibrary.php">ABOUT LIBRARY<span></span></a></li>
            <li class="dropdownhover"><a >E -RESOURCES</a><div class="dropdown">
                    <a href="e-journals.php"> <button >
                            Ejournals
                            <div class="arrow-wrapper" >
                                <div class="arrow"></div>

                            </div>
                        </button></a>

                   <a href="e-book.php"> <button>
                           Ebooks
                           <div class="arrow-wrapper">
                               <div class="arrow"></div>

                           </div>
                       </button></a>

                </div></li>
            <li><a href="researchabstract.php ">RESEARCH ABSTRACT<span></span></a></li>

            <li><a href="">WHAT'S NEW<span></span></a></li>
            <li><a type="button" id="login">ADMIN<span></span></a></li>
        </ul>


    </nav>


</header>
<div class="form">
    <div class="parentloader">
        <div class="loader"></div>
    </div>

    <form id="loginform" >
        <div>
            <button id="closebtn" type="button"><img src="libraryact/close.png"></button>
        </div>

        <header class="inputadd">Login</header>

        <p id="result"></p>

        <input type="text" id="username" placeholder="Usernsame" name="username">

        <p id="result2"></p>

        <input type="text" id="password" placeholder="Password" name="password">


        <button>Cancel</button>
        <button id="loginbtn">Enter</button>

    </form>
</div>


<script>

    $('#login').on('click', function () {

        $('.form').fadeIn().css('display', 'flex');
    })
    $('#closebtn').on('click', function () {
        $('#loginform')[0].reset()
        $('.form').fadeOut(200);
        $('#username').css('border', '1px solid grey')
        $('#password').css('border', '1px solid grey')
        $('#result2').text("")
        $('#result').text("")
    })
    $('#loginform').on('keyup', function () {
        if ($('#username').val() === '') {
            $('#result').css('color', 'red').text("Please fill the field")
            $('#username').css('border', '2px solid red')

        } else {
            $('#result').text("")
            $('#username').css('border', '2px solid green')
        }
        if ($('#password').val() === '') {
            $('#password').css('border', '2px solid red')
            $('#result2').css('color', 'red').text("Please fill the field")
        } else {
            $('#password').css('border', '2px solid green')
            $('#result2').text("")
        }


    })
    $('#loginform').on('click', function (e) {
        e.preventDefault();
    })
    $('#loginbtn').on('click', function () {

        if ($('#password').val() !== '' && $('#username').val() !== '') {
          var uname=$('#username').val();
          var password=$('#password').val();

            $.ajax({
                url: "adminverify.php",
                type: "POST",
                data: {uname:uname,
                password:password},
           dataType:'json',
                success: function (verify) {
              if (verify.status==='valid'){
                  window.location.href="admin.php"
              }
              else{

                  $('#username,#password').css('border', '2px solid red')
                  $('#result,#result2').css('color', 'red').text("invalid password or username")


              }

                }
            });
        } else {
            $('#result').css('color', 'red').text("Please fill the field")
            $('#username').css('border', '2px solid red')

            $('#password').css('border', '2px solid red')
            $('#result2').css('color', 'red').text("Please fill the field")

        }
    })


</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>