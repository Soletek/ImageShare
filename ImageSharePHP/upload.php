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

$imageName = getImageHash() . "." . $extension;
$fileName = "img/" . $imageName;
echo $fileName;

$fp = fopen($fileName, 'wb');

if ( !$fp ) {
    die ("fopen failed");
}

fwrite($fp, base64_decode($data));
fclose($fp);

// Update the database

$conn = connectToMYSQL();

$uploaderIP = getClientIPAddress();
$sql = "INSERT INTO UploadedImages (filename, upload_ip, upload_profile)
        VALUES ('$filename', '$uploaderIP', '')";

$conn->close();

function getImageHash(){
    $rand = rand(10000, 99999);
    return "aBcD0" . $rand;


function getClientIPAddress() {
    return getenv('HTTP_CLIENT_IP');
    //return getenv('REMOTE_ADDR');
}

// DEL??
function get_client_ip() {
    $ipaddress = '';
    if ()
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


?>

