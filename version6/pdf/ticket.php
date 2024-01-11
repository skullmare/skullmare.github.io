<?php
session_start();
$name = $_POST['name'];
$silver = $_POST['silver'];
$gold = $_POST['gold'];
$diamond = $_POST['diamond'];
$place = $_POST['place'];
$date_s = $_POST['date_s'];
$date_e = $_POST['date_e'];
$time_s = $_POST['time_s'];
$time_e = $_POST['time_e'];
$code = $_POST['code'];

define('FPDF_FONTPATH',"fpdf/font/");
require('fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->SetTitle("e-ticket");
$pdf->AddPage('P');
$pdf->AddFont('Arial','','arial.php');
$pdf->SetFont('Arial');
$pdf->SetTextColor(0,0,0);
$pdf->SetFontSize(30);
$pdf->SetXY(90,10);
$pdf->Write(0,iconv('utf-8', 'windows-1251',"Электронный билет"));
$pdf->SetFontSize(20);
$pdf->SetXY(90,20);
$pdf->Write(0,iconv('utf-8', 'windows-1251', 'на "'.$name.'"'));




$pdf->SetDrawColor(128,128,128);
$pdf->Line(10, 31, 195, 31);


$pdf->SetFontSize(15);
	$pdf->SetXY(10,40);
	$pdf->Write(0,iconv('utf-8', 'windows-1251', "Вам доступно:"));

if ($silver > 0){
	$pdf->SetFontSize(12);
	$pdf->SetXY(15,50);
	$pdf->Write(0,iconv('utf-8', 'windows-1251', "".$silver." мест. в STANDART зоне"));
}

if ($gold > 0) {
	$pdf->SetFontSize(12);
	$pdf->SetXY(15,58);
	$pdf->Write(0,iconv('utf-8', 'windows-1251', "".$gold." мест. в VIP зоне"));
}


if ($diamond > 0) {
	$pdf->SetFontSize(12);
	$pdf->SetXY(15,66);
	$pdf->Write(0,iconv('utf-8', 'windows-1251', "".$diamond." мест. в PREMIUM зоне"));
}


$pdf->SetFontSize(15);
$pdf->SetXY(10,80);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "Адрес: "));
$pdf->SetFontSize(10);
$pdf->SetXY(15,90);
$pdf->Write(0,iconv('utf-8', 'windows-1251', $place));
$pdf->SetFontSize(12);
$pdf->SetXY(10,105);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "Начало: ".$date_s." / ".$time_s));

$pdf->SetFontSize(12);
$pdf->SetXY(10,110);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "Конец: ".$date_e." / ".$time_e));





$pdf->Image('http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl='.$code.'',144,40,50,0,'PNG');



$pdf->SetFontSize(11);
$pdf->SetXY(150,88);
$pdf->Write(0,iconv('utf-8', 'windows-1251', $code));

$pdf->Image('pechat-removebg-preview.png',120,139,60,0,'png');

$pdf->SetFontSize(14);
$pdf->SetXY(100,181);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "Контакты: "));
$pdf->SetFontSize(10);
$pdf->SetXY(100,190);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "+7(901)-597-59-10"));
$pdf->SetFontSize(10);
$pdf->SetXY(100,195);
$pdf->Write(0,iconv('utf-8', 'windows-1251', "ostapchuk.ivan.2003@gmail.com"));

$pdf->SetDrawColor(128,128,128);
$pdf->Line(10, 120, 195, 120);


$pdf->SetFontSize(10);
$pdf->SetTextColor(128,128,128);
$pdf->SetXY(10,130);
$pdf->Write(0,iconv('utf-8', 'windows-1251', 'Для прохода на концерт необходимо распечатать билет на обычном принтере или загрузить на своем телефоне'));
$pdf->SetXY(10,135);
$pdf->Write(0,iconv('utf-8', 'windows-1251', 'QR-код с электронного билета. QR-код будет считан сканнером на входе и обеспечит пропуск зрителя на'));
$pdf->SetXY(10,140);
$pdf->Write(0,iconv('utf-8', 'windows-1251', 'мероприятие.'));

$pdf->Image(dirname(__FILE__) .'/upcoming-events-bg-removebg.png', 0, 150, 0, 400, 'png');
$pdf->Output('e-ticket.pdf','I');

