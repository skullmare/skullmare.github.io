<?php
require("connect.php");
if(isset($_POST['id'])){$id = $_POST['id'];}else $id = '0';
if(isset($_POST['silver'])){$silver = $_POST['silver'];}else $silver = '0';
if(isset($_POST['gold'])){$gold = $_POST['gold'];}else $gold = '0';
if(isset($_POST['diamond'])){$diamond = $_POST['diamond'];}else $diamond = '0';
if($silver == 0 && $gold == 0 && $diamond == 0) {header("Location: single-event.php?id=".$id."");}
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$db_handler=mysqli_connect($servername,$username, $password) or die ("Не удается подключиться к базе данных!");
mysqli_select_db($db_handler,$dbname) or die ("Ошибка выбора базы данных!");
$upcoming_event_data_list ="SELECT id, name,
month(date_s) as ms,
month(date_e) as me,
day(date_s) as ds,
day(date_e) as de,
year(date_s) as ys,
year(date_e) as ye,
place, text,
price,
time_s,
time_e
FROM ticketclub.events where id like ".$id."";
$result_upcoming_event_data_list = mysqli_query($db_handler,$upcoming_event_data_list) or die ("Невозможно выполнить SQL запрос!".mysqli_error($db_handler));
while($row = mysqli_fetch_array($result_upcoming_event_data_list)) {
    $ms=$row['ms'];
    if($ms==1){$ms="января";}if($ms==2){$ms="февраля";}if($ms==3){$ms="марта";}
    if($ms==4){$ms="апреля";}if($ms==5){$ms="мая";}if($ms==6){$ms="июня";}
    if($ms==7){$ms="июля";}if($ms==8){$ms="августа";}if($ms==9){$ms="сентября";}
    if($ms==10){$ms="октября";}if($ms==11){$ms="ноября";}if($ms==12){$ms="декабря";}
    $me=$row['me'];
    if($me==1){$me="января";}if($me==2){$me="февраля";}if($me==3){$me="марта";}
    if($me==4){$me="апреля";}if($me==5){$me="мая";}if($me==6){$me="июня";}
    if($me==7){$me="июля";}if($me==8){$me="августа";}if($me==9){$me="сентября";}
    if($me==10){$me="октября";}if($me==11){$me="ноября";}if($me==12){$me="декабря";}
    $date_s = "".$row['ds']." ".$ms.", ".$row['ys']."";
    $date_e = "".$row['de']." ".$me.", ".$row['ye']."";
    $time_s = $row['time_s'];
    $time_e = $row['time_e'];
    $name = $row['name'];
    $id = $row['id'];
    $place = $row['place'];
    $price = $row['price'];
    $text = $row['text'];
}
$conn->close();
$sum = ($silver*$price) + ($gold*$price*2) + ($diamond*$price*4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/mask_phone.js"></script>
    <script src="../js/jquery.js"></script>
    <script src="../js/maskedinput.js"></script>
    <title>Форма оплаты</title>
</head>
<script>
    jQuery(function($){$("#card").mask("9999-9999-9999-9999",{placeholder:"X"}); 
                                  $("#cvc").mask("999",{placeholder:"*"}); 
                                  $("#date").mask("99/99",{placeholder:"_"}); })
</script>
<body>
    <form action="ticket-add.php" method="POST" class="container">
        <div class="row d-flex justify-content-center">
            <img height="80px" src="../images/banks.png" alt="">
        </div>
        <div class="row mt-2">
            <div class="col-lg-6 col-md-12 card m-auto">
                <ul class="list-group list-group-flush">
                    <?php if($silver>0) {echo ('<li class="list-group-item d-flex justify-content-between"><div>Серебряный билет '.$name.' '.$price.'₽</div><div>'.$silver.' шт.</div></li>');}?>
                    <?php if($gold>0) {echo ('<li class="list-group-item d-flex justify-content-between"><div>Золотой билет '.$name.' '.$price*2..'₽</div><div>'.$gold.' шт.</div></li>');}?>
                    <?php if($diamond>0) {echo ('<li class="list-group-item d-flex justify-content-between"><div>Бриллиантовый билет '.$name.' '.$price*4..'₽</div><div>'.$diamond.' шт.</div></li>');}?>
                    <li class="list-group-item text-right fs-1">Итого к оплате <h3><?php echo $sum; ?>₽</h3></li>
                    <li class="list-group-item">
                        <div class="row g-3">
                            <div class="col-md-6 mt-3">
                                <label for="exampleInputEmail1" class="form-label">Телефон</label>
                                <input id="phone" name="phone" type="text" class="form-control tel" placeholder="+7(000)000-00-00" maxlength="30" aria-label="Имя" required autocomplete="off">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" required autocomplete="off">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="exampleInputEmail1" class="form-label">Номер карты</label>
                                <input name="card" id="card" class="form-control card" placeholder="XXXX XXXX XXXX XXXX" type="text" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">CVC</label>
                                <input id="cvc" type="text" placeholder="***" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Дата</label>
                                <input id="date" type="text" placeholder="__/__" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required autocomplete="off">
                            </div>
                            <div class="col-md-12 mt-5 mb-5">
                                <button type="submit" class="btn btn-success w-100">Оплатить</button>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item text-right"><a style="text-decoration: none;" href="single-event.php?id=<?php echo $id?>">Вернуться обратно</a></li>
                </ul>
            </div>
        </div>
        <input type="hidden" name="name" value="<?php echo $name?>">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="hidden" name="silver" value="<?php echo $silver?>">
        <input type="hidden" name="gold" value="<?php echo $gold?>">
        <input type="hidden" name="date_s" value="<?php echo $date_s?>">
        <input type="hidden" name="date_e" value="<?php echo $date_e?>">
        <input type="hidden" name="time_s" value="<?php echo $time_s?>">
        <input type="hidden" name="time_e" value="<?php echo $time_e?>">
        <input type="hidden" name="place" value="<?php echo $place?>">
        <input type="hidden" name="diamond" value="<?php echo $diamond?>">
        <input type="hidden" name="price" value="<?php echo $price?>">
        <input type="hidden" name="sum" value="<?php echo $sum?>">
        <input type="hidden" name="date" value="<?php date_default_timezone_set("Europe/Moscow"); echo date('H:i:s'); ?>">
    </form>
    <img style="margin-top: -600px;" class="w-100" src="../images/upcoming-events-bg.jpg" alt="">
</body>
</html>