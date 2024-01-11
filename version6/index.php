<?php
require("php/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TicketClub</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/custom.js"></script>
</head>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<body>
<header class="site-header">
    <div class="header-bar">
        <div class="container-fluid">
            <div class="row align-items-center d-flex justify-content-between">
                <div class="col-2 col-lg-2 order-lg-1">
                    <div class="site-branding">
                        <div class="site-title">
                            <a class="logo" href="#">⠀</a>
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
                            <li><a href="index.php">Главная</a></li>
                            <li><a href="php/events.php">События</a></li>
                            <li><a href="php/contact.php">Контакты</a></li>
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
                        <h1 class="entry-title">TicketClub</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
</header><!-- .site-header -->
<div class="homepage-info-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-5">
                <figure>
                    <img style="margin-top: 60px;" src="images/index-photo.jpg" alt="logo">
                </figure>
            </div>
            <a id="about"></a>
            <div class="col-12 col-md-8 col-lg-7">
                <header class="entry-header">
                    <h2 class="entry-title">Что такое TicketClub и почему выбирают именно наши услуги?</h2>
                </header>

                <div class="entry-content">
                    <p>TicketClub это интернет площадка для покупки билетов на концерты  и фестивали любых музыкальных жанров по всему миру. С нами сотрудничают исполнители с мировым именем, а также лидирующщие компании. Не упусти свою возможность побывать на крупнейшем шоу, покупай билеты прямо сейчас!</p>
                </div>

                <footer class="entry-footer">
                    <a href="#sub" class="btn dark">Подписаться на TicketClub</a>
                </footer>
            </div>
        </div>
    </div>
</div>
<div class="homepage-featured-events">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-events-wrap flex flex-wrap justify-content-between d-flex flex-wrap ">
                <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Qle0A58OZZ8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="homepage-next-events">
    <div class="container">
        <div class="row">
            <div class="next-events-section-header m-auto">
                <h2 class="entry-title">Ближайшие события</h2>
                <p>В этом списке представленны концерты и фестивали которые <br> пройдут совсем скоро, успей купить билеты для себя и своих друзей!</p>
            </div>
        </div>
        <div class="row">
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
                        place, text,
                        price,
                        img,
                        category_id as c
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
                            <div class="col-12 col-sm-6 col-md-4">
                            <div class="next-event-wrap">
                                <figure>
                                    <a href="php/single-event.php?id='.$row['id'].'"><img src="'.$row['img'].'" alt="1"></a>

                                    <div class="event-rating">⚝</div>
                                </figure>

                                <header class="entry-header">
                                    <h3 class="entry-title">'.$row['name'].'</h3>

                                    <div class="posted-date">'.$row["ds"].' <span>'.$ms.', '.$row["ys"].'</span></div>
                                </header>

                                <div class="entry-content">
                                    <p>'.$row['text'].'</p>
                                </div>

                                <footer class="entry-footer">
                                    <a href="php/single-event.php?id='.$row['id'].'">Купить билеты</a>
                                </footer>
                            </div>
                            </div>
                            ');
                        }
                    ?>
        </div>
    </div>
</div>
<div class="homepage-regional-events">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="regional-events-heading entry-header flex flex-wrap justify-content-between align-items-center">
                    <h2 class="entry-title text-break">Предстоящие мероприятия</h2>
                </header>
                <div class="swiper-container homepage-regional-events-slider">
                    <div class="swiper-wrapper">
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
                        place, text,
                        price,
                        img,
                        category_id as c
                        FROM ticketclub.events where CURDATE() < date_s order by date_s LIMIT 14";
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

                            if($row['c']==1 || $row['c']==2 || $row['c']==6){$img = 'event-'.rand(1, 12).'.jpg';}
                            if($row['c']==3 ){$img = 'exhibition-'.rand(1, 5).'.jpg';}
                            if($row['c']==5 ){$img = 'show-'.rand(1, 5).'.jpg';}
                            echo('
                            <div class="swiper-slide">
                                <figure>
                                    <img src="'.$row['img'].'" alt="">

                                    <a class="event-overlay-link flex justify-content-center align-items-center" href="php/single-event.php?id='.$row['id'].'">+</a>
                                </figure>

                                <div class="entry-header">
                                    <h2 class="entry-title">'.$row['name'].'</h2>
                                </div>

                                <div class="entry-footer">
                                    <div class="posted-date">'.$row["ds"].' <span>'.$ms.', '.$row["ys"].'</span></div>
                                </div>
                            </div>
                            ');
                        }
                    ?>
                    </div><!-- .swiper-wrapper -->
                </div><!-- .swiper-container -->
                <header class="regional-events-heading entry-header flex flex-wrap justify-content-between align-items-center mt-5">
                    <h2 class="entry-title text-break">Наши партнеры</h2>
                </header>
                <div class="swiper-container homepage-regional-events-slider d-flex">

                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure>
                                <img src="images/1.png" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure>
                                <img src="images/2.png" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure>
                                <img src="images/3.png" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure>
                                <img src="images/4.png" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <figure>
                                <img src="images/5.png" alt="">
                            </figure>
                        </div>
                    </div>
                </div><!-- .swiper-container -->
            </div>
        </div>
    </div>
</div>
<a href="" id="sub"></a>
<div class="newsletter-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h2 class="entry-title">Подпишись на нашу рассылку, чтобы быть в курсе последних тенденций и новостей</h2>
                    <p>Присоединяйтесь к нам уже СЕЙЧАС!</p>
                </header>

                <div class="newsletter-form">
                    <form action="php/subscribers-add.php" method="POST" class="flex flex-wrap justify-content-center align-items-center">
                        <div class="col-md-12 col-lg-3">
                            <input name="name" type="text" placeholder="Имя" maxlength="150" required autocomplete="off">
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <input name="email" type="email" placeholder="E-mail" maxlength="150" required autocomplete="off">
                        </div>
                        <input type="hidden" name="page" value="1">
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
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="php/events.php">События</a></li>
                        <li><a href="php/contact.php">Контакты</a></li>
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
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/jquery.countdown.min.js'></script>
<script type='text/javascript' src='js/circle-progress.min.js'></script>
<script type='text/javascript' src='js/jquery.countTo.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
</body>
</html>