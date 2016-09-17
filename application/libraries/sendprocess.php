<?php

$servername = "mysql.probateproject.com";
$username = "dreamadam";
$password = "qscBFE3!2#4";
$dbname = "adamdb";

$phoneNum = $_POST["From"];
$receiveNum = $_POST["To"];
$recTime =  date('m/d/Y h:i:s a', time());
$msg_body = $_POST["Body"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tb_recsms (PhoneNum, RecTime, Content)
VALUES (\"$phoneNum\", \"$recTime\", \"$msg_body\")";

echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>