<?php
session_start();
$name = $_SESSION['name'];
$card = $_SESSION['card'];
$silver = $_SESSION['silver'];
$gold = $_SESSION['gold'];
$diamond = $_SESSION['diamond'];
$price = $_SESSION['price'];
$sum = $_SESSION['sum'];
$date = $_SESSION['date'];

define('FPDF_FONTPATH',"fpdf/font/");
require('fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->SetTitle("check");
$pdf->AddPage('P');
$pdf->AddFont('Arial','','arial.php');
$pdf->SetFont('Arial');
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(30);
$pdf->SetXY(90,10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"OOO TICKETCLUB."));
$pdf->SetFontSize(10);
$pdf->SetXY(90,18);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Адрес организации: Сиреневый бульвар 4Г"));
$pdf->SetXY(90,24);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Получатель: OOO TICKETCLUB. 40817810099910004312"));
$pdf->SetFontSize(15);
$pdf->SetXY(10,35);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "(".$name.")"));
if ($silver > 0){
	$pdf->SetFontSize(10);
	$pdf->SetXY(10,45);
	$pdf->Write(0,iconv('utf-8', 'windows-1251', "Серебряный билет ".$name." ".$price."руб. ".$silver."шт."));
}


if ($gold > 0) {
	$pdf->SetFontSize(10);
	$pdf->SetXY(10,50);
	$pdf->Write(0,iconv('utf-8', 'windows-1251', "Золотой билет ".$name." ".$price*2.."руб. ".$gold."шт."));
}


if ($diamond > 0) {
	$pdf->SetFontSize(10);
	$pdf->SetXY(10,55);
	$pdf->Write(0,iconv('utf-8', 'windows-1251', "Бриллиантовый билет ".$name." ".$price*4.."руб. ".$diamond."шт."));
}


$pdf->SetFontSize(10);
$pdf->SetXY(10,80);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "Оплачено ".$date.". Номер карты: ".$card));
$pdf->SetFontSize(30);
$pdf->SetXY(10,90);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "Итог: ".$sum."руб."));

$pdf->SetFontSize(20);
$pdf->SetXY(120,120);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "Контакты TicketClub: "));
$pdf->SetFontSize(10);
$pdf->SetXY(120,130);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "+7(901)-597-59-10"));
$pdf->SetFontSize(10);
$pdf->SetXY(120,135);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "ostapchuk.ivan.2003@gmail.com"));



$pdf->Image(dirname(__FILE__) .'/upcoming-events-bg.jpg', 0, 150, 0, 400, 'JPG');
$pdf->Output('check.pdf','I');