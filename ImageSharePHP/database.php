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
            imagename VARCHAR(50),
            filename VARCHAR(20) NOT NULL,
            upload_ip VARCHAR(30) NOT NULL,
            upload_profile VARCHAR(50),
            upload_date DATETIME DEFAULT CURRENT_TIMESTAMP,
            gallery_id INT(6)
            )";

    if ($conn->query($sql) === TRUE) {
        echo "New table created successfully\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "\n";
    }

    $sql = "CREATE TABLE Profiles (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            imagename VARCHAR(50),
            filename VARCHAR(20) NOT NULL,
            upload_ip VARCHAR(30) NOT NULL,
            upload_profile VARCHAR(50),
            reg_date DATETIME DEFAULT CURRENT_TIMESTAMP,
            gallery_id VARCHAR(10)
            )";

    if ($conn->query($sql) === TRUE) {
        echo "New table created successfully\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "\n";
    }
}

function makeQuery($conn, $sql){
    if ($conn->query($sql) === TRUE) {
        echo "Query successful\n";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "\n";
    }
}

?>



