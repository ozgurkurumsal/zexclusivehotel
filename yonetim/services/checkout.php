<?php
// include('configuration.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 


      $data = json_decode(file_get_contents('php://input'),true);
    //   $str = $data['token'];
      $msisdn_64 = json_decode(base64_decode($data['token']),true);
      print_r($msisdn_64);

     echo $msisdn_64['id'];
     echo $msisdn_64['data']['adult'];
     echo $msisdn_64['data']['searchdate1'];
     echo $msisdn_64['data']['searchdate2'];
     echo $msisdn_64['data']['child'];



    //    $value = base64_decode($manage['token']); 
    //    echo $value[0]['id'];
    //    echo $data->token;
     
    //    echo json_encode(base64_decode($data['id']));
    //  print_r(json_decode($data['token']));
     
    //  $token =  base64_decode($data['token']);

    //  echo  $token['id'];

     


    //  base64_decode($data->token)


    //   $odaId = $token['id'];  
    //   $date1  = date('Y-m-d',strtotime($token['data']['searchdate1'])); 
    //   $date2  = date('Y-m-d',strtotime($token['data']['searchdate2']));
    //   $total =  $token['data']['adult']+ $token['data']['child'];

    //   echo $token['id'];

    //   echo json_encode(array(
    //       "result" =>"ok",
    //       "odaId" => $odaId,
    //       "date1" => $date1,
    //       "date2" => $date2,
    //       "token" => $token

    //     ));
    
     

   

 

    //  $sql = $db->prepare("SELECT *, (select COALESCE(SUM(fiyat),0) FROM donemler WHERE odaId = odalar.odaId AND tarih >= :date1 AND tarih < :date2) AS fiyat FROM odalar WHERE (kapasite+ekstraKisi) >= :total AND odaId = :odaId"); 
    //  $sql->bindValue(':odaId', $odaId);
    //  $sql->bindValue(':date1', $date1);
    //  $sql->bindValue(':date2', $date2);
    //  $sql->bindValue(':total', $total);
    //  $sql->execute();
    //     $value  = $sql->fetchAll(PDO::FETCH_OBJ);
    //     echo json_encode($value);  

?>