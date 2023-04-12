<?php
include('configuration.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 
 //set headers to NOT cache a page
 header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
 header("Pragma: no-cache"); //HTTP 1.0
//  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

 //or, if you DO want a file to cache, use:
//  header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)



     $data = json_decode(file_get_contents('php://input'));

     $total = $data->adult+$data->child;
     $date1  = date('Y-m-d',strtotime($data->searchdate1)); 
     $date2  = date('Y-m-d',strtotime($data->searchdate2));

     $token =  base64_decode($data->token);
   
     $sql = $db->prepare("SELECT *, (select COALESCE(SUM(fiyat),0) FROM donemler WHERE odaId = odalar.odaId AND tarih >= :date1 AND tarih < :date2) AS fiyat FROM odalar WHERE (kapasite+ekstraKisi) >= :total "); 
     $sql->bindValue(':date1', $date1);
     $sql->bindValue(':date2', $date2);
     $sql->bindValue(':total', $total);
     $sql->execute();
        $value  = $sql->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($value);  

?>