<?php 
session_start();
$name = $_SESSION['name'];
$silver = $_SESSION['silver'];
$gold = $_SESSION['gold'];
$diamond = $_SESSION['diamond'];
$place = $_SESSION['place'];
$date_s = $_SESSION['date_s'];
$date_e = $_SESSION['date_e'];
$time_s = $_SESSION['time_s'];
$time_e = $_SESSION['time_e'];
$code = $_SESSION['code'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    .arrow-left span {
    display: block;
    width: 13px;
    height: 13px;
    border-bottom: 4px solid gray;
    border-left: 4px solid gray;
   
    margin: -2px;
    animation: arrow-left 1s infinite;
    float: left;
    }

    .arrow-left-2 span {
    display: block;
    width: 13px;
    height: 13px;
    border-bottom: 4px solid gray;
    border-left: 4px solid gray;
   
    margin: -2px;
    animation: arrow-left-2 1s infinite;
    float: left;
    }

    @keyframes arrow-left {
        0%{
            opacity: 0;
            transform: rotate(45deg) translate(-0px,-0px);
        }
        50%{
            opacity: 1;
        }
        100%{
            opacity: 0;
            transform: rotate(45deg) translate(0px,0px);
        }
    }
   
    @keyframes arrow-left-2 {
        0%{
            opacity: 0;
            transform: rotate(225deg) translate(-0px,-0px);
        }
        50%{
            opacity: 1;
        }
        100%{
            opacity: 0;
            transform: rotate(225deg) translate(0px,0px);
        }
    }
</style>
<body>
    <h1 class="text-center pt-5 pb-2">Благодарим Вас, что пользуетесь нашим сервисом!</h1>
    <p style="color: gray;" class="text-center pb-3">Ниже прикреплен электронный билет, не забудьте предьявить его <br> в печатном или электронном виде при входе на мероприятие.</p>

    <div class="container">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">TicketClub</a></li>
            <li class="breadcrumb-item active" aria-current="page">На главную</li>
        </ol>
        </nav>

        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item w-100">
            <form action="../pdf/ticket.php" method="POST">
            <input type="hidden" name="name" value="<?php echo $name;?>">
            <input type="hidden" name="silver" value="<?php echo $silver;?>">
            <input type="hidden" name="gold" value="<?php echo $gold;?>">
            <input type="hidden" name="diamond" value="<?php echo $diamond;?>">
            <input type="hidden" name="place" value="<?php echo $place;?>">
            <input type="hidden" name="date_s" value="<?php echo $date_s;?>">
            <input type="hidden" name="date_e" value="<?php echo $date_e;?>">
            <input type="hidden" name="time_s" value="<?php echo $time_s;?>">
            <input type="hidden" name="time_e" value="<?php echo $time_e;?>">
            <input type="hidden" name="code" value="<?php echo $code;?>">
            <div class="d-flex justify-content-center">  
                <div class="arrow-left-2 mr-3 pt-3">
                    <span></span>
                </div>
                <div style="cursor: pointer;"><button class="btn btn-primary" type="submit">Ваш электронный билет</button></div>
                <div class="arrow-left ml-3 pt-3">
                    <span></span>
                </div>
            </div>
            </form>
        </ol>
        </nav>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">+7(901)597-59-10</a></li>
            <li class="breadcrumb-item"><a href="">ostapchuk.ivan.2003@gmail.com</a></li>
            <li class="breadcrumb-item active" aria-current="page">Контактные данные</li>
        </ol>
        </nav>
    </div>
    
    <img class="w-100" src="../images/upcoming-events-bg.jpg" alt="">
</body>
</html>