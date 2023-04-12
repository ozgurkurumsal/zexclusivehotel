<?php

class Reservation{

    private $name;
    private $mail;
    private $odaId;
    private $rezCode;
    private $price;
    private $phone;
    private $roomName;
    private $adult;
    private $child;
    public $db;

    // public $db = new PDO("mysql:host=localhost;dbname=zexclusivehotel_reservation","zexclusivehotel_reservation","zexclusivehotel_reservation");
  

    public function __construct()
    {
 		
         $this->db = new PDO("mysql:host=localhost;dbname=zexclusivehotel_reservation","zexclusivehotel_reservation","zexclusivehotel_reservation");
         $this->db -> exec("set names utf8");

         setlocale(LC_TIME,'turkish'); 

  
        
    }

    function getReservation($rezCode){
        $sql = $this->db->prepare("SELECT * FROM rezervasyonlar JOIN odalar ON odalar.odaId = rezervasyonlar.odaId WHERE rezervasyonKodu = 'dXt5HDsm' ");
        // $sql->bindParam(':rezCode',$rezCode,PDO::PARAM_STR);
        // $sql->bindParam(':rezCode','dXt5HDsm',PDO::PARAM_STR);
  
        if (!$sql->execute()) {
          print_r($sql->errorInfo());
        }else {
          // echo "OK";
        //   $data = ;
          return $sql->fetchAll(PDO::FETCH_OBJ);
          
        }

    }

    function addReservation($odaId,$odaAdi,$rezCode,$name,$soyadi,$mail,$girisTarihi,$cikisTarihi,$phone,$roomName,$adult,$child,$price,$message){
    // $this->db = new PDO("mysql:host=localhost;dbname=zexclusivehotel_reservation","zexclusivehotel_reservation","zexclusivehotel_reservation");
       
        //      print_r($this->db);
            $sql = $this->db->prepare("INSERT INTO rezervasyonlar(odaId,odaAdi,rezervasyonKodu,adi,girisTarihi,cikisTarihi,kisiSayisi,cocukSayisi,tutar,soyadi,eposta,ulke,telefon,adres,mesajiniz,odemeTipi,odenenTutar) 
            	VALUES (:odaId,:odaAdi,:rezCode, :name,:girisTarihi,:cikisTarihi,:adult,:child,:tutar,:soyadi,:mail,'.',:phone,'.',:message,'Kredi Kartı',:tutar) ");
            $sql->bindParam(':odaId',$odaId,PDO::PARAM_INT);
            $sql->bindParam(':odaAdi',$odaAdi,PDO::PARAM_STR);
            $sql->bindParam(':rezCode',$rezCode,PDO::PARAM_STR);
            $sql->bindParam(':name', $name,PDO::PARAM_STR);
            $sql->bindParam(':soyadi', $soyadi,PDO::PARAM_STR);
            $sql->bindParam(':mail', $mail,PDO::PARAM_STR);
            $sql->bindParam(':adult', $adult,PDO::PARAM_INT);
            $sql->bindParam(':child', $child,PDO::PARAM_INT);
            $sql->bindParam(':phone', $phone,PDO::PARAM_STR);
            $sql->bindParam(':tutar', $price,PDO::PARAM_STR);
            $sql->bindParam(':message', $message,PDO::PARAM_STR);
            $sql->bindParam(':girisTarihi', $girisTarihi,PDO::PARAM_STR);
            $sql->bindParam(':cikisTarihi', $cikisTarihi,PDO::PARAM_STR);
        
         if (!$sql->execute()) {
           print_r($sql->errorInfo());
         }else {
         	// echo "OK";
          return json_encode(array("result" =>"ok"));
          
         }
      
    }

    function updateReservation($rezCode,$status,$aciklama){
      $sql = $this->db->prepare("UPDATE rezervasyonlar SET durum = :durum, durumAciklamasi = :aciklama WHERE rezervasyonKodu = :rezCode ");
      $sql->bindParam(':durum',$status,PDO::PARAM_STR);
      $sql->bindParam(':rezCode',$rezCode,PDO::PARAM_STR);
      $sql->bindParam(':aciklama',$aciklama,PDO::PARAM_STR);

      if (!$sql->execute()) {
        print_r($sql->errorInfo());
      }else {
        // echo "OK";
        return json_encode(array("result" =>"ok"));
        
      }
    }

}


?>