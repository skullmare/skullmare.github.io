<?php 
require("connect.php");
echo $name=$_POST['name'];
echo $email=$_POST['email'];
echo $page=$_POST['page'];
echo $id=$_POST['id'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$db_handler=mysqli_connect($servername,$username, $password) or die ("Не удается подключиться к базе данных!");
mysqli_select_db($db_handler,$dbname) or die ("Ошибка выбора базы данных!");

$sql = "INSERT INTO `ticketclub`.`subscribers` (`name`, `email`) VALUES ('".$name."', '".$email."');";

if ($conn->query($sql) === TRUE) {
    echo "Record insert successfully";
} else {
    echo "Error in record: " . $conn->error;
}
$conn->close();
if($page==1) {
    header("Location: ../index.php");
}
if($page==2) {
    header("Location: events.php");
}
if($page==3) {
    header("Location: contact.php");
}
if($page==4) {
    header("Location: single-event.php?id=".$id."");
}

