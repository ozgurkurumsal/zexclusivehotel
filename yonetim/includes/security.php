<?php

if ((!isset($_SESSION['login_user'])) OR  ($_SESSION['login_user'] != 'ozgur')) {
	header("Location: login.php");
	exit;
}
?>