<!DOCTYPE html>

<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="mainStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta name="google-signin-client_id" content="88858681272-jadvv8dggn1811010b660uemm2mpf5tl.apps.googleusercontent.com">
    <script src="contentLoader.js"></script>
    <script>
        $(function () {
            loadHeader();

            <?php
            $img = $_GET["img"];

            if ($img){
                require "database.php";
                $imgpath = getImagePathFromDatabase($img);

                echo "contentImage('$imgpath', 0);";
            } else {
                echo "contentUpload();";
            }
            ?> 
        });
    </script>


</head>

<body>
    <div id="header"></div>
    <div id="contents"></div>
    <h2 id="debug"></h2>
</body>
</html>







