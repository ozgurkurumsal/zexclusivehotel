<?php
include "configuration.php";


$username = $_POST['username'];
$user_pass = $_POST['password'];


	$strSQL = $db->query("SELECT COUNT(*) as sayi ,Adi,Soyadi FROM kullanicilar WHERE Username = '$username' AND Password = '$user_pass'");
	$sonuc = $strSQL->fetch(PDO::FETCH_OBJ);

	if (($sonuc->sayi != 1))
		{
			$_SESSION['hata'] = "Kullanıcı adı veya şifre hatalı";
			header("Location: ../login.php");
			
		}
		else{

			//echo "Sayi".$sonuc->sayi;

			$_SESSION['login_user'] = 'ozgur';
			$_SESSION['Name'] = $sonuc->Adi;
			$_SESSION['Surname'] = $sonuc->Soyadi;
	
				header("Location: ../index.php");

			}
		
?>