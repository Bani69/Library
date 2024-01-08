<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Cinzel|Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic|Open+Sans+Condensed:300,300italic,700|Didact+Gothic">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<body>
<?php include "nav.php"; ?>


<div class="ejcon">E-JOURNALS</div>
<div class="seacrch-input">
    <input type="text" placeholder="Search" name="text" class="input" id="searchjournal">
    <svg fill="white" width="15px" height="15px" viewBox="0 0 1920 1920"
         xmlns="http://www.w3.org/2000/svg">
        <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z"
              fill-rule="evenodd"></path>
    </svg>
</div>
<div class="journalcard" id="journalcard">



</div>


</body>
</html>
<script>

    Query()
    function Query() {
        $.ajax({
                type: "POST",
                url: "practice.php",
                data: {},

                success: function (data) {


                    data.map((fetch => {
                        $('#journalcard').append(' <div class="card">' +
                            '<div class="temporary_text">' +
                            '<img src="' + fetch.imageurl + '">' +
                            '</div>' +
                            '<div class="card_content">' + ' <div class="card_content">' +
                            '<span class="card_title">' + fetch.journalname + '</span>' +

                            ' <div class="card_description"><p>' + fetch.description + '<p></div>' +
                            '<a href="' + fetch.url + '"><button>' +
                            ' Take a look' +
                            ' <div class="arrow-wrapper">' +
                            ' <div class="arrow"></div>' +

                            '</div>' +
                            '</button></a>' +
                            '</div>' +
                            '</div>')
                    }))


                    $('#searchjournal').on('keyup', function () {
                        var input = $(this).val().toLowerCase();
                        $('#journalcard .card').filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(input) > -1);


                        })

                    })


                }


            }
        )
    }


</script>