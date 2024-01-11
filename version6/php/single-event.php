<?php
require("connect.php");
if(isset($_GET['id'])){$id = $_GET['id'];}else $id = '0';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$db_handler=mysqli_connect($servername,$username, $password) or die ("Не удается подключиться к базе данных!");
mysqli_select_db($db_handler,$dbname) or die ("Ошибка выбора базы данных!");
$upcoming_event_data_list ="SELECT 
e.id as id,
e.name as name,
month(e.date_s) as ms,
month(e.date_e) as me,
day(e.date_s) as ds,
day(e.date_e) as de,
year(e.date_s) as ys,
year(e.date_e) as ye,
e.place as place,
e.text as text,
e.price as price,
e.img as img,
e.category_id as c_id,
c.name as category,
e.time_s as time_s,
e.time_e as time_e
FROM ticketclub.events e
left join categories c on e.category_id=c.id
where e.id like ".$id."";
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
    $id = $row['id'];
    $name = $row['name'];
    $place = $row['place'];
    $price = $row['price'];
    $text = $row['text'];
    $img = $row['img'];
    $c = $row['c_id'];
    $category = $row['category'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $name; ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="single-event-page">
<header class="site-header">
    <div class="header-bar">
        <div class="container-fluid">
            <div class="row align-items-center d-flex justify-content-between">
                <div class="col-2 col-lg-2 order-lg-1">
                    <div class="site-branding">
                        <div class="site-title">
                            <a class="logo" href="#">TicketClub</a>
                        </div><!-- .site-title -->
                    </div><!-- .site-branding -->
                </div><!-- .col -->

                <div class="col-2 col-lg-7 order-3 order-lg-2">
                    <nav class="site-navigation">
                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->

                        <ul>
                            <li><a href="../index.php">Главная</a></li>
                            <li><a href="events.php">События</a></li>
                            <li><a href="contact.php">Контакты</a></li>
                        </ul>
                    </nav><!-- .site-navigation -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .header-bar -->

    <div class="page-header events-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php echo $name; ?></h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
</header><!-- .site-header -->

<div class="container">
    <div class="row">
        <div class="col-12 single-event">
            <div class="event-content-wrap">
                <header class="entry-header flex flex-wrap justify-content-between align-items-end">
                    <div class="single-event-heading">
                        <h2 class="entry-title"><?php echo $name; ?></h2>

                        <div class="event-location"><a href="#"><?php echo $place; ?></a></div>

                        <div class="event-date"><?php echo $date_s.' - '.$date_e ?></div>
                    </div>
                </header>

                <figure class="events-thumbnail">
                    <img src="<?php echo $img?>" alt="">
                </figure>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tabs">
                <ul class="tabs-nav flex">
                    <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_details">Детали</li>
                    <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_about">О мероприятии</li>
                </ul>

                <div class="tabs-container">
                    <div id="tab_details" class="tab-content">
                        <div class="flex flex-wrap justify-content-between">
                            <div class="single-event-details">
                                <div class="single-event-details-row">
                                    <label>Начало:</label>
                                    <p><?php echo $date_s." / ".$time_s; ?></p>
                                </div>

                                <div class="single-event-details-row">
                                    <label>Конец:</label>
                                    <p><?php echo $date_e." / ".$time_e; ?></p>
                                </div>

                                <div class="single-event-details-row">
                                    <label>Цена:</label>
                                    <p><span>от <?php echo $price; ?>₽</span></p>
                                </div>

                                <div class="single-event-details-row">
                                    <label>Категория:</label>
                                    <p><?php echo $category; ?></p>
                                </div>

                            </div>

                            <div class="single-event-map">
                            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A6fbec3ce8d1abc24c0b07ac5f49d4875e0fb754e061836a8bf695c4aba5a94db&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>

                    <div id="tab_about" class="tab-content">
                        <p><?php echo $text; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="form-payment.php" method="POST" class="event-tickets">
                
                <div class="ticket-row flex flex-wrap justify-content-between align-items-center">
                    <div class="ticket-type flex justify-content-between align-items-center">
                        <h3 class="entry-title"><span>Серебряный билет</span> STANDART ZONE</h3>

                        <div class="ticket-price"><?php echo $price; ?>₽</div>
                    </div>

                    <div class="flex align-items-center">
                        <div class="number-of-ticket flex justify-content-between align-items-center">
                            <span class="decrease-ticket">-</span>
                            <input type="number" class="ticket-count" value="0" max="25" name="silver" required/>
                            <span class="increase-ticket">+</span>
                        </div>

                        <div class="clear-ticket-count">Очистить</div>
                    </div>
                </div>

                <div class="ticket-row flex flex-wrap justify-content-between align-items-center">
                    <div class="ticket-type flex justify-content-between align-items-center">
                        <h3 class="entry-title"><span>Золотой билет</span> VIP ZONE</h3>

                        <div class="ticket-price"><?php echo $price*2; ?>₽</div>
                    </div>

                    <div class="flex align-items-center">
                        <div class="number-of-ticket flex justify-content-between align-items-center">
                            <span class="decrease-ticket">-</span>
                            <input type="number" class="ticket-count" value="0" max="25" name="gold" required/>
                            <span class="increase-ticket">+</span>
                        </div>

                        <div class="clear-ticket-count">Очистить</div>
                    </div>
                </div>

                <div class="ticket-row flex flex-wrap justify-content-between align-items-center">
                    <div class="ticket-type flex justify-content-between align-items-center">
                        <h3 class="entry-title"><span>Бриллиантовый билет</span> PREMIUM ZONE</h3>

                        <div class="ticket-price"><?php echo $price*4; ?>₽</div>
                    </div>

                    <div class="flex align-items-center">
                        <div class="number-of-ticket flex justify-content-between align-items-center">
                            <span class="decrease-ticket">-</span>
                            <input type="number" class="ticket-count" value="0" max="25" name="diamond" required/>
                            <span class="increase-ticket">+</span>
                        </div>

                        <div class="clear-ticket-count">Очистить</div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="d-flex justify-content-end"><input type="submit" class="btn gradient-bg" value="Купить билеты"></div>
                
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tabs">
                <ul class="tabs-nav flex">
                    <li class="tab-nav flex justify-content-center align-items-center" data-target="#standart">Standart zone</li>
                    <li class="tab-nav flex justify-content-center align-items-center" data-target="#vip">Vip zone</li>
                    <li class="tab-nav flex justify-content-center align-items-center" data-target="#premium">Premium zone</li>
                </ul>

                <div class="tabs-container">
                    <div id="standart" class="tab-content">
                        <p>Standart zone (Стандартная зона) — подразумевает обычные места в зале расположенные далеко от сцены но с учетом сохранения качества звука.</p>
                    </div>

                    <div id="vip" class="tab-content">
                        <p>Vip zone (Вип зона) — танцевальная площадка рядом с сценой и возможностью прямого конта с исполнителем.</p>
                    </div>

                    <div id="premium" class="tab-content">
                        <p>Premium zone (Премиум зона) — зона для фанатов рядом с сценой, что дает возможность прямого контакта с вашим кумиром. Подразумевает наличие столиков с минибаром и танцевальной площадкой.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="upcoming-events">
                    <div class="upcoming-events-header">
                        <h4>Предстоящие события</h4>
                    </div>
                    <?php 
                        $i=0;
                        $servername = "localhost"; $username = "root"; $password = "root"; $dbname = "ticketclub";
                        $conn = new mysqli($servername, $username, $password, $dbname);
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
                        place, text, img,
                        price
                        FROM ticketclub.events where CURDATE() < date_s order by date_s LIMIT 3";
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
                            $i++;
                            echo('
                            <div class="upcoming-events-list">
                                <div class="upcoming-event-wrap flex flex-wrap justify-content-between align-items-center">
                                <figure class="events-thumbnail">
                                    <a href="single-event.php?id='.$row['id'].'"><img style="margin-top: 25px;" src="'.$row['img'].'" alt=""></a>
                                </figure>
                                <div class="entry-meta">
                                    <div class="event-date">
                                    '.$row['ds'].'<span>'.$ms.'</span>
                                    </div>
                                </div>
                                <header class="entry-header">
                                    <h3 class="entry-title"><a href="single-event.php?id='.$row['id'].'">'.$row['name'].'</a></h3>
                                    <div class="event-date-time">'.$row["ds"].' '.$ms.' '.$row["ys"].' - '.$row["de"].' '.$me.' '.$row["ye"].'</div>
                                    <div class="event-text text-truncate" style="max-width: 500px;">'.$row['text'].'</div>
                                </header>

                                <footer class="entry-footer">
                                    <a href="single-event.php?id='.$row['id'].'">Купить билеты</a>
                                </footer>
                                </div>
                            </div>
                            ');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="newsletter-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h2 class="entry-title">Подпишись на нашу рассылку, чтобы быть в курсе последних тенденций и новостей</h2>
                    <p>Присоединяйтесь к нам уже СЕЙЧАС!</p>
                </header>

                <div class="newsletter-form">
                    <form action="subscribers-add.php" method="POST" class="flex flex-wrap justify-content-center align-items-center">
                        <div class="col-md-12 col-lg-3">
                            <input name="name" type="text" placeholder="Имя" maxlength="150" required autocomplete="off">
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <input name="email" type="email" placeholder="E-mail" maxlength="150" required autocomplete="off">
                        </div>
                        <input type="hidden" name="page" value="4">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div class="col-md-12 col-lg-3">
                            <input class="btn gradient-bg" type="submit" value="Подписаться">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <figure class="footer-logo">
                    <a class="logo" href="#">TicketClub.</a>
                </figure>

                <nav class="footer-navigation">
                    <ul class="flex flex-wrap justify-content-center align-items-center">
                        <li><a href="../index.php">Главная</a></li>
                        <li><a href="events.php">События</a></li>
                        <li><a href="contact.php">Контакты</a></li>
                    </ul>
                </nav>

                <div class="footer-social">
                    <ul class="flex flex-wrap justify-content-center align-items-center">
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="back-to-top flex justify-content-center align-items-center">
    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1395 1184q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
</div>

<script type='text/javascript' src='../js/jquery.js'></script>
<script type='text/javascript' src='../js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='../js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='../js/swiper.min.js'></script>
<script type='text/javascript' src='../js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='../js/circle-progress.min.js'></script>
<script type='text/javascript' src='../js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='../js/custom.js'></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>