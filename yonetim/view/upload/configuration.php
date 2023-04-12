<?php
session_start();
ob_start();

$_SESSION['deneme'] = "Session test";
$sunucu = "remote"; // remote veya local olarak kullanıyoruz

switch($sunucu){

	case "remote": 

	try {

		$db = new PDO("mysql:host=localhost;dbname=emirkirt_hyt","emirkirt_murat","Afr150318..");

		$db -> exec("set names utf8");

		// echo "Bağlantı sağlandı";
	}

	catch(PDOException $error){

	// echo $error->getMessage();

	}

	break;

	} // Switch end
?>