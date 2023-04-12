<?php
session_start();
session_destroy();
$adres = $_SERVER['HTTP_REFERER'];
header('Location:'.$adres);
?>