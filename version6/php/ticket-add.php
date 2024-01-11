<?php
require("connect.php");
session_start();

$name = $_POST['name'];
$silver = $_POST['silver'];
$gold = $_POST['gold'];
$diamond = $_POST['diamond'];
$price = $_POST['price'];
$date = $_POST['date'];
$date_s = $_POST['date_s'];
$date_e = $_POST['date_e'];
$place = $_POST['place'];
$time_s = $_POST['time_s'];
$time_e = $_POST['time_e'];




$id = $_POST['id'];
$card = $_POST['card'];
$code = rand(1000000000000000, 9999999999999999);
$sum = $_POST['sum'];
$phone = $_POST['phone'];
$email = $_POST['email'];



$_SESSION['name']=$name;
$_SESSION['silver']=$silver;
$_SESSION['gold']=$gold;
$_SESSION['diamond']=$diamond;
$_SESSION['price']=$price;
$_SESSION['date']=$date;
$_SESSION['date_s']=$date_s;
$_SESSION['date_e']=$date_e;
$_SESSION['place']=$place;
$_SESSION['time_s']=$time_s;
$_SESSION['time_e']=$time_e;
$_SESSION['card']=$card;
$_SESSION['sum']=$sum;
$_SESSION['code']=$code;


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$db_handler=mysqli_connect($servername,$username, $password) or die ("Не удается подключиться к базе данных!");
mysqli_select_db($db_handler,$dbname) or die ("Ошибка выбора базы данных!");

$sql = "INSERT INTO `ticketclub`.`tickets` (`code`, `email`, `tel`, `sum`, `status_id`, `event_id`, `st`, `gt`, `dt`)
VALUES ('".$code."', '".$email."', '".$phone."', '".$sum."', '1', '".$id."', '".$silver."', '".$gold."', '".$diamond."');";

if ($conn->query($sql) === TRUE) {
    echo "Record insert successfully";
} else {
    echo "Error in record: " . $conn->error;
}
$conn->close();

header('Location: result.php');
?>