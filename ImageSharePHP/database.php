<?php

//$conn = connectToMYSQL();
//initializeTables($conn);
//$conn->close();

function connectToMYSQL(){
    $servername = "localhost";
    $username = "root";
    $password = "QwErTy.600";
    $database = "test";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

//function notVeryUsefulFunction() {
//    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//            VALUES ('John', 'Doe', 'john@example.com')";
    
//}

function initializeTables($conn){
    $sql = "CREATE TABLE UploadedImages (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            imagecode VARCHAR(20) NOT NULL,
            filename VARCHAR(25) NOT NULL,
            description VARCHAR(50),
            upload_ip VARCHAR(20) NOT NULL,
            upload_profile VARCHAR(50),
            upload_date DATETIME DEFAULT CURRENT_TIMESTAMP,
            gallery_id INT(6)
            )";

    if ($conn->query($sql) === TRUE) {
        echo "New table created successfully\n";
    } else {
        throw new ErrorException ("Query failed: " . $sql . "\n\n" . $conn->error);
    }

    $sql = "CREATE TABLE Profiles (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            upload_profile VARCHAR(50),
            reg_date DATETIME DEFAULT CURRENT_TIMESTAMP,
            gallery_id VARCHAR(10)
            )";

    if ($conn->query($sql) === TRUE) {
        echo "New table created successfully\n";
    } else {
        throw new ErrorException ("Query failed: " . $sql . "\n\n" . $conn->error);
    }
}

function getImagePathFromDatabase($img) {
    $conn = connectToMYSQL();
    
    $sql = "SELECT imagecode, filename FROM UploadedImages WHERE imagecode = '$img'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row['filename'];
    } else if ($result->num_rows > 1) {

    }

    $conn->close();

    return "";
}

?>



