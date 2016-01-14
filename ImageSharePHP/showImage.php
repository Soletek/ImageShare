<?php
$img_path = "/img/" . $_GET["img"];
$img_height = $_GET["height"];

echo '<div id="image-zone" style="min-height: ' . ($img_height + 25) . 'px;">';
echo '<div id="image">';

echo '<img src="' . $img_path . '" alt="failed to load the image" />';

echo '</div>';
echo '</div>';
?>

<div id="scroll"></div>
