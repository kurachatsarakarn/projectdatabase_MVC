<?php
$servername = "localhost";
$username = "db23_120";
$password = "db23_120";
#$dbname = "db23_120";


$conn = new mysqli($servername,$username,$password);
$conn->set_charset("utf8");
if($conn->connect_error){
     //die("connection failed:".$conn->connect_error);
}
 //echo("Successfully connected to server <br>");

if(!$conn->select_db($dbname)){
     //echo $conn->connect_error;
}
else{
    //echo "successfully connected to database <br>";
}
?>