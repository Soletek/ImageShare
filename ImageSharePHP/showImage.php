<script>
    document.getElementById("img").onload = function () {
        var image = document.getElementById('img');
        var imageHeight = image.height;

        document.getElementById("contents").style.minHeight = (imageHeight + 80).toString() + "px";
        document.getElementById("image-zone").style.minHeight = (imageHeight + 25).toString() + "px";
    }
</script>

<?php
require "database.php";

$imgpath = "/img/" . getImagePathFromDatabase($_GET["img"]);
echo '<div id="image-zone">';
echo '<div id="image">';
echo '<img id="img" src="' . $imgpath . '" alt="failed to load the image" />';
echo '</div>';
echo '</div>';

$uploadStatus = $_GET["uploadstatus"];
if ($uploadStatus == 1){
    echo '<div id="message">';
    echo 'Upload successful!';
    echo '</div>';
}
?>

<div id="scroll">
    <?php
    ?>
</div>
