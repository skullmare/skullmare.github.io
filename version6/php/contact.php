<!DOCTYPE html>
<html lang="en">
<head>
    <title>Контакты</title>

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
<body class="contact-page">
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

    <div class="page-header contact-page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="entry-header">
                        <h1 class="entry-title">Контакты</h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
</header><!-- .site-header -->

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="contact-location-details">
                <h2 class="entry-title">Москва</h2>

                <div class="entry-content">
                    <p>Главный директор: <br> Остапчук Иван Андреевич  </p>
                    
                </div>

                <footer class="entry-footer">
                    <ul>
                        <li class="contact-address">Сиреневый бульвар 4Г этаж 5 ауд. 53</li>
                        <li class="contact-number">+7(901)597-59-10</li>
                        <li class="contact-email"><a href="#">ostapchuk@gmail.com</a></li>
                    </ul>
                </footer>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="contact-location-details">
                <h2 class="entry-title">Санкт-Петербург</h2>

                <div class="entry-content">
                <p>Заместитель директора: <br> Павлова Вероника Романовна  </p>
                </div>

                <footer class="entry-footer">
                    <ul>
                        <li class="contact-address">ул. Типанова 21 Тц Питер 1 этаж кб. 211</li>
                        <li class="contact-number">+7(633)456-54-32</li>
                        <li class="contact-email"><a href="#">pavlova@gmail.com</a></li>
                    </ul>
                </footer>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
            <div class="contact-location-details">
                <h2 class="entry-title">Екатеринбург</h2>

                <div class="entry-content">
                <p>Заместитель директора: <br> Щеников Данил Алексеевич </p>
                </div>

                <footer class="entry-footer">
                    <ul>
                        <li class="contact-address">ул. Громова 32 к.11 25 этаж кб. 546</li>
                        <li class="contact-number">+7(443)486-22-43</li>
                        <li class="contact-email"><a href="#">schenikov@gmail.com</a></li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
</div>

<div class="contact-page-map">
<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A6fbec3ce8d1abc24c0b07ac5f49d4875e0fb754e061836a8bf695c4aba5a94db&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
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
                        <input type="hidden" name="page" value="3">
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