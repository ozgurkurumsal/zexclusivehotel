<?php
 header('Content-Type: text/html');
require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateThreedsPaymentRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId($_POST['conversationId']);
$request->setPaymentId($_POST['paymentId']);
$request->setConversationData($_POST['conversationData']);

// echo "<pre>";
// print_r($_POST);

// echo "</pre>";

# make request
$threedsPayment = \Iyzipay\Model\ThreedsPayment::create($request, Config::options());


// echo "<pre>";
// # print result
// print_r($threedsPayment);

// echo "</pre>";


// echo $threedsPayment->getErrorMessage();
// echo "<br>";
// echo $threedsPayment->getStatus();
// echo $threedsPayment->getConversationId();

if ($threedsPayment->getStatus() == 'success'){
    $reservation = new Reservation();
    // print_r($reservation->getReservation($threedsPayment->getConversationId()));
    $data = $reservation->getReservation($threedsPayment->getConversationId())[0];

    $reservation->updateReservation($threedsPayment->getConversationId(),$threedsPayment->getStatus(),$threedsPayment->getErrorMessage());

    $room =  file_get_contents('../../onay.html');
    $room = str_replace("{roomName}",$data->odaAdi,$room);
    $room = str_replace("{name}",$data->adi,$room);
    $room = str_replace("{resim1}",$data->resim1,$room);
    $room = str_replace("{resim2}",$data->resim2,$room);
    $room = str_replace("{roomSubTitle}",$data->aciklama,$room);
    $room = str_replace("{odaDetay}",$data->detay,$room);
    $room = str_replace("{girisTarihi}",iconv('latin5','utf-8',strftime(' %d %B %Y %A',strtotime($data->girisTarihi))),$room);
    $room = str_replace("{cikisTarihi}",iconv('latin5','utf-8',strftime(' %d %B %Y %A',strtotime($data->cikisTarihi))),$room);
    $room = str_replace("{yetiskin}",$data->kisiSayisi,$room);
    $room = str_replace("{cocuk}",$data->cocukSayisi,$room);
    $room = str_replace("{tutar}",$data->tutar,$room);
    $room = str_replace("{rezCode}",$data->rezervasyonKodu,$room);

    $room = str_replace("{status}","check",$room);
    $room = str_replace("{rezDurum}","Rezervasyonunuz onaylandı.",$room);

    echo $room;

}else {
    
    $reservation = new Reservation();
    // print_r($reservation->getReservation($threedsPayment->getConversationId()));
    $data = $reservation->getReservation($threedsPayment->getConversationId())[0];

    $reservation->updateReservation($threedsPayment->getConversationId(),$threedsPayment->getStatus(),$threedsPayment->getErrorMessage());

    $room =  file_get_contents('../../onay.html');
    $room = str_replace("{roomName}",$data->odaAdi,$room);
    $room = str_replace("{name}",$data->adi,$room);
    $room = str_replace("{resim1}",$data->resim1,$room);
    $room = str_replace("{resim2}",$data->resim2,$room);
    $room = str_replace("{roomSubTitle}",$data->aciklama,$room);
    $room = str_replace("{odaDetay}",$data->detay,$room);
    $room = str_replace("{girisTarihi}",iconv('latin5','utf-8',strftime(' %d %B %Y %A',strtotime($data->girisTarihi))),$room);
    $room = str_replace("{cikisTarihi}",iconv('latin5','utf-8',strftime(' %d %B %Y %A',strtotime($data->cikisTarihi))),$room);
    $room = str_replace("{yetiskin}",$data->kisiSayisi,$room);
    $room = str_replace("{cocuk}",$data->cocukSayisi,$room);
    $room = str_replace("{tutar}",$data->tutar,$room);
    $room = str_replace("{rezCode}",$data->rezervasyonKodu,$room);
   
   
    $room = str_replace("{status}","times",$room);
    $room = str_replace("{rezDurum}","Rezervasyonunuz onaylanamadı. <br/> Hata Kodu : {$threedsPayment->getErrorMessage()}",$room);
   
    
    echo $room;


}
