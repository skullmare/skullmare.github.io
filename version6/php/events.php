<?php
require("connect.php");
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $where = "  && name like '%".$search."%'
                or place like '%".$search."%'
                or date_s like '%".$search."%'
                or date_e like '%".$search."%'";
}else {
    $where = ' ';
}

if(isset($_POST['limit'])){$limit = $_POST['limit']; $limit = " LIMIT ".$limit."";}else{$limit = " LIMIT 6";};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>События</title>

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

    <!-- jquery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="../js/jquery.js"></script>
</head>
<script>

</script>
<body class="events-list-page">
<header class="site-header">
    <div class="header-bar">
        <div class="container-fluid">
            <div class="row align-items-center d-flex justify-content-between">
                <div class="col-10 col-lg-2 order-lg-1">
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

    <div class="page-header events-news-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">События</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
</header><!-- .site-header -->

<form action="events.php" method="GET" class="events-search">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <input type="text" name="search" placeholder="Введите дату, место проведения или наименование мероприятия для поиска..." maxlength="100">
            </div>

            <div class="col-12 col-md-4">
                <input class="btn gradient-bg" type="submit" value="Поиск">
                <input class="btn gradient-bg" type="submit" value="Сброс">
            </div>
        </div>
    </div>
</form>

<div class="container">
    <div class="row events-list">
        <?php 
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $db_handler=mysqli_connect($servername,$username, $password) or die ("Не удается подключиться к базе данных!");
        mysqli_select_db($db_handler,$dbname) or die ("Ошибка выбора базы данных!");
        $event_data_list ="SELECT id, name,
        month(date_s) as ms,
        month(date_e) as me,
        day(date_s) as ds,
        day(date_e) as de,
        year(date_s) as ys,
        year(date_e) as ye,
        place, 
        text,
        img,
        price,
        category_id as c
        FROM ticketclub.events where CURDATE() < date_s ".$where." order by date_s";
        $result_event_data_list = mysqli_query($db_handler,$event_data_list) or die ("Невозможно выполнить SQL запрос!".mysqli_error($db_handler));
        while($row = mysqli_fetch_array($result_event_data_list)) {
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
            echo('
            
            <div class="col-12 col-lg-6 single-event">
                
                <div style="min-height: 550px; height: auto; padding: 36px !important" class="event-content-wrap">
                    <div class="container-fluide mb-4" ><a href="single-event.php?id='.$row['id'].'" ><img class="w-100" src="'.$row['img'].'"></a></div>
                    <header class="entry-header flex justify-content-between">
                        <div>
                            <h2 class="entry-title"><a href="single-event.php?id='.$row['id'].'">'.$row["name"].'</a></h2>
                            <div class="event-location"><a href="#">'.$row["place"].'</a></div>
                            <div class="event-date">'.$row["ds"].' '.$ms.' '.$row["ys"].' - '.$row["de"].' '.$me.' '.$row["ye"].'</div>
                        </div>
                        <div class="event-cost flex justify-content-center align-items-center">
                            от<span>₽'.$row["price"].'</span>
                        </div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="load-more-btn">
                <a class="btn gradient-bg" href="#">Открыть больше</a>
            </div>
        </div>
    </div>
</div>
<div class="upcoming-events-outer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="upcoming-events">
                    <div class="upcoming-events-header">
                        <h4>Предстоящие события</h4>
                    </div>
                    <?php 
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
                        <input type="hidden" name="page" value="2">
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

</body>
</html>