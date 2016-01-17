<?php

require 'database.php';
$mysql = connectToMYSQL();

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

$imagecode = getImageHash($mysql);
$filename = $imagecode . "." . $extension;

$fp = fopen("img/" . $filename, 'wb');

if ( !$fp ) {
    die ("Couldn't save the image.");
}

fwrite($fp, base64_decode($data));
fclose($fp);

// Update the database

$uploaderIP = getClientIPAddress();
$profile = "";

$stmt = $mysql->prepare("INSERT INTO UploadedImages (imagecode, filename, upload_ip, upload_profile) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $imagecode, $filename, $uploaderIP, $profile);
$stmt->execute();

$stmt->close();
$mysql->close();
echo $imagecode;

function getImageHash($mysql){
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