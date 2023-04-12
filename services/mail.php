<?php
require_once('../mailphp/PHPMailerAutoload.php');
session_start();
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'mail.zexclusivehotel.com';
$mail->Port = 587;
// $mail->SMTPSecure = 'tls';
$mail->Username = 'web@zexclusivehotel.com';
$mail->Password = 'UPE3Xe9Lqbg5';
$mail->SetFrom($mail->Username, 'iletisim formu');


 $mail->AddBCC('ozgurr.ozdemirr@gmail.com','Özgür Özdemir');
//  $mail->AddAddress('ozgurr.ozdemirr@gmail.com','Özgür Özdemir');
//  $mail->AddAddress('sales@academy-trade.com','Academy Trade');

// $mail->AddBCC('cmuratafsar@gmail.com','Murat Afşar');
// $mail->AddBCC('info@isikbilgisayar.com','Info');
// $mail->AddBCC('isa@isikbilgisayar.com','isa');

$mail->CharSet = 'UTF-8';
$mail->Subject = 'Site iletişim formundan geldi';
// $mail->MsqHTML = "Deneme Maili içeriği";
$mail->IsHTML(true);

//gelen veriler
// $isim = $_POST['name'];
// $soyisim = $_POST['lastname'];
// $email = $_POST['email'];
// $tel = $_POST['phone'];
// $mesaji = $_POST['comment'];

// $adress = $_POST['adress'];
// $country = $_POST['country'];
// $companyName = $_POST['companyName'];
// $category = $_POST['category'];


$content= "<h2>Sayın Yetkili</h2>"; 
// $content.= "Sipariş Formudur <Br>";
// $content.= "Firma Adı : ".$companyName."<br>";
// $content.= "İsim : ".$isim."<br>";
// $content.= "Soyisisim : ".$soyisim."<br>";
// $content.= "Adres : ".$adress."<br>";
// $content.= "Ülke : ".$country."<br>";
// $content.= "Kategori : ".$category."<br>";
// $content.= "e-mail : ".$email."<br>";
// $content.= "Tel : ".$tel."<br>";
// $content.= "Mesaj : ".$mesaji."<br>";




$mail->MsgHTML($content);


			if($mail->Send()) {
				
				echo json_encode(array("Result" => 'Ok'));
			      
			  } else {
			      
			      echo $mail->ErrorInfo;
			      $_SESSION['mesaj']="e posta başarısız";
			  }
			  // $mail->ClearAddresses(); // remove previous email addresses
		


?>
