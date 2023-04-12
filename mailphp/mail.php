<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once('class.phpmailer.php');
$mail = new PHPMailer();
$mail->Username = 'paymentsystem@kayahomesonline.com';
$mail->Password = 'kaya2013';
$mail->From = 'paymentsystems@kayahomesonline.com';
$mail->FromName = 'Kaya Homes Muhasebe Departmanı';
$mail->Subject = 'Konu';
$mail->AddAddress('ozgurr.ozdemirr@gmail.com');
$mail->Body = 'Bu alan ise icerik yani mesaj icerigi';
$mail->Send();

/*
$g_mail = "paymentsystem@kayahomesonline.com";
$g_isim = "Kaya Homes Muhasebe Departman?";
$giden = "ozgurr.ozdemirr@gmail.com";   
$baslik = "Deneme Maili";   // Bu k?s?mda t?rk?e karakter kullanmamaya ?zen g?sterin

$mesaj = "HTML Mail Alan?";

$header = "From: $g_isim <".$g_mail.">\n"; 
$header .= "Reply-To: $g_isim <".$g_mail.">\n";
$header .= "Return-Path: $g_isim <".$g_mail.">\n";  
$header .= "Delivered-to:  $g_isim <".$g_mail.">\n";
//$header .= "Date: ".date(r)."\n";
$header .= "Content-Type: text/html; charset=iso-8859-9\n";   
$header .= "MIME-Version: 1.0\n";
$header .= "Importance: Normal\n";
$header .= "X-Sender: $g_isim <".$g_mail.">\n";   
$header .= "X-Priority: 3\n";   
$header .= "X-MSMail-Priority: Normal\n";
$header .= "X-Mailer: Microsoft Office Outlook, Build 11.0.5510\n";
//$header .= "Disposition-Notification-To: $g_isim <".$g_mail.">\n";
$header .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2900.2869\n";

mail($giden, $baslik, $mesaj, $header);
*/

?> 
