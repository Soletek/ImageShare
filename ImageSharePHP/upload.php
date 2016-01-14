<?php

require 'database.php';

//

$separatorPos = strpos($_POST['data'], ",") + 1;
$meta = substr($_POST['data'], 0, $separatorPos - 1);
$data = substr($_POST['data'], $separatorPos);

$separatorPos = strpos($meta, "data:") + 5;
$datatype = substr($meta, $separatorPos , strpos($meta, ";") - $separatorPos);
$extension = substr($datatype, strpos($datatype, "/") + 1);

if (substr($datatype, 0, 5) != "image"){
    die ("Uploaded file is not an image.");
}

$imagecode = getImageHash();
$filename = $imagecode . "." . $extension;

$fp = fopen("img/" . $filename, 'wb');

if ( !$fp ) {
    die ("Couldn't save the image.");
}

fwrite($fp, base64_decode($data));
fclose($fp);

// Update the database

$conn = connectToMYSQL();

$uploaderIP = getClientIPAddress();
$sql = "INSERT INTO UploadedImages (imagecode, filename, upload_ip, upload_profile)
        VALUES ('$imagecode', '$filename', '$uploaderIP', '')";

if ($conn->query($sql) === TRUE) {
    echo $imagecode;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "\n";
}

$conn->close();

function getImageHash(){
    $rand = rand(100000, 999999);
    return "aBcD" . $rand;
}

function getClientIPAddress() {

    if (checkIP(getenv('HTTP_CLIENT_IP'))){
        return getenv('HTTP_CLIENT_IP');
    }

    if (checkIP(getenv('REMOTE_ADDR'))){
        return getenv('REMOTE_ADDR');
    }

    return "unknown";
}

/*! 
 * 
 */
function checkIP($ip) {
    return ($ip && $ip != "127.0.0.1");
}


?>