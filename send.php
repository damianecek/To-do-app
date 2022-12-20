<?php 
$host = "localhost";
$user = "root";
$password = "";
$database = "todoapp";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Could not connect to database: " . mysqli_connect_error());
}
$item =  $_POST['newItem'];
if(trim($item) == ''){
    header("Location: ".$_SERVER['HTTP_REFERER']."");
   }
$sql = "INSERT INTO list (item) VALUES ('$item')";
if (mysqli_query($conn, $sql)) {
    header("Location: ".$_SERVER['HTTP_REFERER']."");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>