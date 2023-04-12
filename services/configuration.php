<?php
session_start();
ob_start();





	try {

		$db = new PDO("mysql:host=localhost;dbname=zexclusivehotel_reservation","zexclusivehotel_reservation","zexclusivehotel_reservation");

		 $db -> exec("set names utf8");
        // $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");

		//   echo "Bağlantı sağlandı";
	}

	catch(PDOException $error){

	// echo $error->getMessage();

	}

?>