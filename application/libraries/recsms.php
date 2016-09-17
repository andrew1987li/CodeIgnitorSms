<?php
require "application/libraries/tools.php";

$servername = "mysql.probateproject.com";
$username = "dreamadam";
$password = "qscBFE3!2#4";
$dbname = "adamdb";

   date_default_timezone_set('US/Eastern');
 //  echo date_default_timezone_get();
   $currenttime = date('m/d/Y h:i:s a');


$phoneNum = $_POST["From"];
$receiveNum = $_POST["To"];
//$recTime =  date('m/d/Y h:i:s a', time());
$recTime =  $currenttime;
$msg_body = $_POST["Body"];

$msg=sprintf("From %s\n Msg\n %s", $phoneNum, $msg_body);
send_Sms("+18136000015", $msg);
//send_Sms("+8615714254213", $msg);
//send_Sms("+8618242423147", $msg);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO tb_recsms (PhoneNum, RecTime, Content)
VALUES (\"$phoneNum\", \"$recTime\", \"$msg_body\")";

//echo $sql;

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>