<?php
include('configuration.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 


      $data = json_decode(file_get_contents('php://input'),true);
    //   $str = $data['token'];
      $decoded = json_decode(base64_decode($data['token']),true);
      // print_r($decoded);

    //  echo $decoded['id'];
    //  echo $decoded['data']['adult'];
    //  echo $decoded['data']['searchdate1'];
    //  echo $decoded['data']['searchdate2'];
    //  echo $decoded['data']['child'];




      $odaId = $decoded['id'];  
      $date1  = date('Y-m-d',strtotime($decoded['data']['searchdate1'])); 
      $date2  = date('Y-m-d',strtotime($decoded['data']['searchdate2']));
      $total =  $decoded['data']['adult']+ $decoded['data']['child'];
      $adult =  $decoded['data']['adult'];
      $child =  $decoded['data']['child'];

      // echo $token['id'];

      // echo json_encode(array(
      //     "result" =>"ok",
      //     "odaId" => $odaId,
      //     "date1" => $date1,
      //     "date2" => $date2,
      //     "adult" => $adult,
      //     "child" => $child

      //   ));
    
     
 

     $sql = $db->prepare("SELECT *, (select COALESCE(SUM(fiyat),0) FROM donemler WHERE odaId = odalar.odaId AND tarih >= :date1 AND tarih < :date2) AS fiyat FROM odalar WHERE (kapasite+ekstraKisi) >= :total AND odaId = :odaId"); 
     $sql->bindValue(':odaId', $odaId);
     $sql->bindValue(':date1', $date1);
     $sql->bindValue(':date2', $date2);
     $sql->bindValue(':total', $total);
     $sql->execute();
        $value  = $sql->fetchAll(PDO::FETCH_OBJ);
        echo json_encode(array(
          "odaBilgileri" => $value,
          "date1"  => $decoded['data']['searchdate1'],
          "date2"  => $decoded['data']['searchdate2'],
          "adult"  =>  $decoded['data']['adult'],
          "child"  =>  $decoded['data']['child']

        ));  

?>